<?php

namespace App\Http\Controllers;

use App\Models\Lugartrabajo;
use App\Models\Personal;
use App\Models\User;
use App\Models\Horario;
use Illuminate\Http\Request;

/**
 * Class LugartrabajoController
 * @package App\Http\Controllers
 */
class LugartrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugartrabajos = Lugartrabajo::paginate();

        return view('lugartrabajo.index', compact('lugartrabajos'))
            ->with('i', (request()->input('page', 1) - 1) * $lugartrabajos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugartrabajo = new Lugartrabajo();
        $usuarios = User::selectRaw('CONCAT (name,":  ",usuario) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $horarios = Horario::selectRaw('CONCAT (nombre,":  ",horario_ini,"|",horario_fin) AS nombre,id')->pluck('nombre','id');
        return view('lugartrabajo.create', compact('lugartrabajo','usuarios','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lugartrabajo::$rules);

        $lugartrabajo = Lugartrabajo::create($request->all());

        return redirect()->route('lugartrabajos.index')
            ->with('success', 'Lugar de trabajo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugartrabajo = Lugartrabajo::find($id);

        return view('lugartrabajo.show', compact('lugartrabajo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lugartrabajo = Lugartrabajo::find($id);
        $usuarios = User::selectRaw('CONCAT (name,":  ",usuario) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $horarios = Horario::selectRaw('CONCAT (nombre,":  ",horario_ini,"|",horario_fin) AS nombre,id')->pluck('nombre','id');
        return view('lugartrabajo.edit', compact('lugartrabajo','usuarios','horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lugartrabajo $lugartrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lugartrabajo $lugartrabajo)
    {
        request()->validate(Lugartrabajo::$rules);

        $lugartrabajo->update($request->all());

        return redirect()->route('lugartrabajos.index')
            ->with('success', 'Lugar de trabajo actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lugartrabajo = Lugartrabajo::find($id)->delete();

        return redirect()->route('lugartrabajos.index')
            ->with('success', 'Lugar de trabajo eliminado correctamente');
    }
}
