<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use App\Models\Pai;
use App\Models\Cargo;
use App\Models\User;
use App\Models\Acceso;
use Illuminate\Support\Facades\Hash;
use DB;
/**
 * Class PersonalController
 * @package App\Http\Controllers
 */
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::paginate();

        return view('personal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = new Personal();
        $paices = Pai::pluck('pais','id');
        $cargos = Cargo::pluck('cargo','id');
        $accion = 'insertar';
        return view('personal.create', compact('personal','paices','cargos','accion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Personal::$rules);

        $personal = Personal::create($request->all());

        $data['name'] = $request->nombre.' '.$request->primer_apellido.' '.$request->segundo_apellido.'['.$personal->id.']';
        $data['email'] = $request->nombre[0].$request->primer_apellido.'@correo.com';
        $data['rol'] = 2;
        $data['usuario'] = $request->doc_identidad;
        $data['estado'] = 'Activo';
        $data['password'] = Hash::make($request->doc_identidad);
        $user = User::create($data);
        $user_id = $user->id;
        //
        $opcion = [
                    'Configuracion (Salario mínimo nacional)',
                    'Pais de nacionalidad',
                    'Cargos',
                    'Datos de empresa',
                    'Roles usuario',
                    'Modulo usuarios',
                    'Modulo de registro de personal',
                    'Modulo contrataciones',
                    'Horarios',
                    'Registrar ubicacion de trabajo',
                    'Permisos',
                    'Modulo de control de asistencia',
                    'Modulo de sueldos y salarios',
                    'Asistencia (GPS)',
                    'Asistencia manual',
                    'Modulo registro facturas Form. 110',
                    'Asistencia Offline',
                    'Modulo web control de asistencia'
                    ];
        $icono = [
                    '<i class="bi bi-badge-vr-fill"></i>',
                    '<i class="bi bi-flag"></i>',
                    '<i class="bi bi-diagram-3-fill"></i>',
                    '<i class="bi bi-building"></i>',
                    '<i class="bi bi-person-bounding-box"></i>',
                    '<i class="bi bi-person-bounding-box"></i>',
                    '<i class="bi bi-card-list"></i>',
                    '<i class="bi bi-person-rolodex"></i>',
                    '<i class="bi bi-clock-history"></i>',
                    '<i class="bi bi-geo-alt-fill"></i>',
                    '<i class="bi bi-exclamation-diamond-fill"></i>',
                    '<i class="bi bi-clipboard-data"></i>',
                    '<i class="bi bi-file-spreadsheet-fill"></i>',
                    '<i class="bi bi-fingerprint"></i>',
                    '<i class="bi bi-display"></i>',
                    '<i class="bi bi-file-earmark-arrow-up"></i>',
                    '<i class="bi bi-fingerprint"></i>',
                    '<i class="bi bi-fingerprint"></i>'
                    ];
        $link = [
                    'variables.index',
                    'pais.index',
                    'cargos.index',
                    'empresas.index',
                    'rols.index',
                    'users.index',
                    'personals.index',
                    'contratacions.index',
                    'horarios.index',
                    'lugartrabajos.index',
                    'permisos.index',
                    'menu_asistencia',
                    'menu_sueldos',
                    'asistencias.create',
                    'index_asistenciaAdmin',
                    'form110s.index',
                    'lista_asistenciaOff',
                    'asistencias.create'
                ];
        $estado = [
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Deshabilitado',
                    'Habilitado',
                    'Deshabilitado',
                    'Habilitado'
                    ];
        for ($i=0; $i < count($opcion); $i++) {
            $acceso = new Acceso();
            $acceso->user_id = $user_id;
            $acceso->opcion = $opcion[$i];
            $acceso->icono = $icono[$i];
            $acceso->link = $link[$i];
            $acceso->estado = $estado[$i];
            $acceso->save();
        }


        return redirect()->route('personals.index')
            ->with('success', 'Personal creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personal = Personal::find($id);

        return view('personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = Personal::find($id);
        $paices = Pai::pluck('pais','id');
        $cargos = Cargo::pluck('cargo','id');
        $accion = 'modificar';
        return view('personal.edit', compact('personal','paices','cargos','accion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Personal $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        request()->validate(Personal::$rules);

        $personal->update($request->all());

        return redirect()->route('personals.index')
            ->with('success', 'Datos de personal actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $personal = Personal::find($id)->delete();

        return redirect()->route('personals.index')
            ->with('success', 'Personal eliminado exitosamente');
    }
}
