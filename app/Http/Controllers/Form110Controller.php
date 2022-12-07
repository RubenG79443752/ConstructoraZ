<?php

namespace App\Http\Controllers;

use App\Models\Form110;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
/**
 * Class Form110Controller
 * @package App\Http\Controllers
 */
class Form110Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol==1) {
            $form110s = Form110::paginate();

            return view('form110.index', compact('form110s'))
            ->with('i', (request()->input('page', 1) - 1) * $form110s->perPage());  
        }
        else{
            $usuario = Auth::id();
        $form110s = Form110::where('user_id',$usuario)->paginate();

        return view('form110.index', compact('form110s'))
            ->with('i', (request()->input('page', 1) - 1) * $form110s->perPage());

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form110 = new Form110();

        $accion = 'insertar';
        $usuario = Auth::id();

        $nom = Auth::user()->name;
        $aux = explode('[',$nom);
        $personal = [];
        if (strpos($nom,'[')) {
            $pid = $aux[1];
            $id = explode(']',$pid);
            $id_personal = $id[0];
            $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('id',$id_personal)->where('estado','Activo')->pluck('nombre','id');

        }
        return view('form110.create', compact('form110','personal','accion','usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Form110::$rules);

        $form110 = Form110::create($request->all());
        if($request->file('form110')){
            $path=Storage::disk('public')->put('pdfForm110',$request->file('form110'));
            $form110->fill(['form110'=>$path])->save();
        }

        return redirect()->route('form110s.index')
            ->with('success', 'Formulario 110 subido satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form110 = Form110::find($id);

        return view('form110.show', compact('form110'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form110 = Form110::find($id);
        $nom = Auth::user()->name;
        $aux = explode('[',$nom);
        $personal = [];
        if (strpos($nom,'[')) {
            $pid = $aux[1];
            $id = explode(']',$pid);
            $id_personal = $id[0];
            $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('id',$id_personal)->where('estado','Activo')->pluck('nombre','id');

        }

        $accion = 'modificar';
        $usuario = Auth::id();
        return view('form110.edit', compact('form110','personal','accion','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Form110 $form110
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form110 $form110)
    {
        request()->validate(Form110::$rules);

        $form110->update($request->all());
        if($request->file('form110')){
            $path=Storage::disk('public')->put('pdfForm110',$request->file('form110'));
            $form110->fill(['form110'=>$path])->save();
        }

        return redirect()->route('form110s.index')
            ->with('success', 'Formulario 110 modificado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $form110 = Form110::find($id)->delete();

        return redirect()->route('form110s.index')
            ->with('success', 'Formulario 110 eliminado');
    }
}
