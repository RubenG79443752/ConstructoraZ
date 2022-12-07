<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

/**
 * Class PermisoController
 * @package App\Http\Controllers
 */
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::paginate();

        return view('permiso.index', compact('permisos'))
            ->with('i', (request()->input('page', 1) - 1) * $permisos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permiso = new Permiso();
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $accion = 'insertar';
        return view('permiso.create', compact('permiso','personal','accion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Permiso::$rules);

        $permiso = Permiso::create($request->all());

        if($request->file('justificativo')){
            $path=Storage::disk('public')->put('pdfJusticativos',$request->file('justificativo'));
            $permiso->fill(['justificativo'=>$path])->save();
        }

        return redirect()->route('permisos.index')
            ->with('success', 'Permiso registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);

        return view('permiso.show', compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permiso = Permiso::find($id);
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $accion = 'modificar';
        return view('permiso.edit', compact('permiso','personal','accion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Permiso $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        request()->validate(Permiso::$rules);

        $permiso->update($request->all());
        if($request->file('justificativo')){
            $path=Storage::disk('public')->put('pdfJusticativos',$request->file('justificativo'));
            $permiso->fill(['justificativo'=>$path])->save();
        }
        return redirect()->route('permisos.index')
            ->with('success', 'Permiso actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $permiso = Permiso::find($id)->delete();

        return redirect()->route('permisos.index')
            ->with('success', 'Permiso eliminado');
    }
}
