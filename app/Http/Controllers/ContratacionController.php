<?php

namespace App\Http\Controllers;

use App\Models\Contratacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
use App\Models\Personal;
/**
 * Class ContratacionController
 * @package App\Http\Controllers
 */
class ContratacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratacions = Contratacion::paginate();

        return view('contratacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contratacion = new Contratacion();
        $accion='insertar';
        $empresas = Empresa::pluck('razon_social','id');
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",primer_apellido," ",segundo_apellido) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        return view('contratacion.create', compact('contratacion','accion','empresas','personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contratacion::$rules);

        $contratacion = Contratacion::create($request->all());
        if($request->file('contrato')){
            $path=Storage::disk('public')->put('imgContratos',$request->file('contrato'));
            $contratacion->fill(['contrato'=>$path])->save();
        }

        return redirect()->route('contratacions.index')
            ->with('success', 'Contratacion creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratacion = Contratacion::find($id);
        return view('contratacion.show', compact('contratacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratacion = Contratacion::find($id);
        $accion='modificar';
        $empresas = Empresa::pluck('razon_social','id');
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",primer_apellido," ",segundo_apellido) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        return view('contratacion.edit', compact('contratacion','accion','empresas','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contratacion $contratacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contratacion $contratacion)
    {
        request()->validate(Contratacion::$ruless);

        $contratacion->update($request->all());
        if($request->file('contrato')){
            $path=Storage::disk('public')->put('imgContratos',$request->file('contrato'));
            $contratacion->fill(['contrato'=>$path])->save();
        }
        return redirect()->route('contratacions.index')
            ->with('success', 'Contratacion actualizada exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contratacion = Contratacion::find($id)->delete();

        return redirect()->route('contratacions.index')
            ->with('success', 'Contratacion eliminada satisfactoriamente');
    }
}
