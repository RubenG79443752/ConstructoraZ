<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use App\Models\Asistencia;
use App\Models\Permiso;
use App\Models\Personal;
use App\Models\Empresa;
use App\Models\Variable;
use App\Models\Contratacion;
use Illuminate\Http\Request;

/**
 * Class PlanillaController
 * @package App\Http\Controllers
 */
class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu_sueldos()
    {
        return view('planilla.menu');
    }
    public function index()
    {
        $planillas = Planilla::paginate();

        return view('planilla.index', compact('planillas'))
            ->with('i', (request()->input('page', 1) - 1) * $planillas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planilla = new Planilla();
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",primer_apellido," ",segundo_apellido) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        return view('planilla.create', compact('planilla','personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Planilla::$rules);

        $planilla = Planilla::create($request->all());

        return redirect()->route('planillas.index')
            ->with('success', 'Empleado registrado en planilla exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planilla = Planilla::find($id);

        return view('planilla.show', compact('planilla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planilla = Planilla::find($id);
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",primer_apellido," ",segundo_apellido) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        return view('planilla.edit', compact('planilla','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Planilla $planilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planilla $planilla)
    {
        request()->validate(Planilla::$rules);

        $planilla->update($request->all());

        return redirect()->route('planillas.index')
            ->with('success', 'Datos de planilla actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planilla = Planilla::find($id)->delete();

        return redirect()->route('planillas.index')
            ->with('success', 'Eliminar registro');
    }
    public function generar_planilla()
    {
        return view('planilla.generar_planilla');
    }
    public function planilla_generada(Request $request)
    {
        $anio = $request->anio;
        $mes = $request->mes;
        $empresa = Empresa::first();

        $planilla = Planilla::join('personals','personals.id','planillas.personal_id')
                                ->join('contratacions','personals.id','contratacions.personal_id')
                                ->join('pais','pais.id','personals.pais_id')
                                ->join('cargos','cargos.id','personals.cargo_id')
                                ->where('planillas.mes',$mes)
                                ->where('planillas.anio',$anio)
                                ->where('planillas.estado','Activo')
                                ->orderBy('personals.primer_apellido','asc')
                                ->get();

        return view('planilla.plani')
                    ->with('anio',$anio)
                    ->with('mes',$mes)
                    ->with('empresa',$empresa)
                    ->with('planilla',$planilla);
    }
    public function obtener_personal(Request $request){
        $personal_id = $request->id;
        $mes =  $request->mes;
        $anio =  $request->anio;


        $personal = Personal::where('id',$personal_id)->first();
        // variables
        $smn = Variable::where('id',1)->first();
        $rc_iva = Variable::where('id',2)->first();
        //asistencia
        $resp = $this->obtenerTablaAsistencia($personal_id, $anio, $mes);
        $tabla = $resp['tabla'];
        $response['horas_extra'] = $resp['horas_extra'];
        $response['tabla_asistencia'] = $tabla;

        // General

        $response['mensaje'] = 'Datos de empleado(a): ';
        $response['empleado'] = $personal->nombre.' '.$personal->primer_apellido.' '.$personal->segundo_apellido;
        $response['smn'] = $smn->valor;
        $response['rc_iva'] = $rc_iva->valor;


        $contratacion = Contratacion::where('personal_id',$personal_id)
                                    ->orderBy('id','desc')
                                    ->first();
        // haber basico
        $response['haber_basico'] = isset($contratacion->sueldo_inicial)? $contratacion->sueldo_inicial:0;
        //bono antiguedad
        $response['fecha_ingreso'] = isset($contratacion->fecha_ingreso)? $contratacion->fecha_ingreso:0;
        //saldo anterior
        $response['saldo_anterior'] = isset($contratacion->saldo_anterior)? $contratacion->saldo_anterior:0;


        echo json_encode($response);
        exit;
    }
    public function obtenerTablaAsistencia($personal, $gestion, $mes){
        $gestion = date('Y');
        $mes_l = ['Enero'=>'01','Febrero'=>'02','Marzo'=>'03','Abril'=>'04','Mayo'=>'05','Junio'=>'06','Julio'=>'07','Agosto'=>'08','Septiembre'=>'09','Octubre'=>'10','Noviembre'=>'11','Diciembre'=>'12'];
        $m = $mes_l[$mes];
        $horas_laboradas = Asistencia::where('personal_id',$personal)
                                    ->whereYear('fecha_asitencia',$gestion)
                                    ->whereMonth('fecha_asitencia',$m)
                                    ->sum('tiempo_laborado');
        $tardanza = Asistencia::where('personal_id',$personal)
                                    ->whereYear('fecha_asitencia',$gestion)
                                    ->whereMonth('fecha_asitencia',$m)
                                    ->sum('tardanza');
        $permiso = Permiso::where('personal_id',$personal)
                                    ->whereYear('desde_fecha',$gestion)
                                    ->whereMonth('desde_fecha',$m)
                                    ->sum('horas');
        $t_laborado = round($horas_laboradas/24);

        if($horas_laboradas > 720){
            $horas_extra = $horas_laboradas - 720;
        }
        else{
            $horas_extra = 0;
        }
        $tabla = '<div id="t_asistencia"><table class="table table-bordered border-primary" style="font-size: 12px;">
        <tr style="background: rgba(95, 195, 235, 0.918); font-size:10px;font-weight: bold">
            <td>Gestion</td>
            <td>Mes</td>
            <td>Dias trabajados</td>
            <td>Horas trabajadas &#40;Hrs&#41;</td>
            <td>Tardanzas &#40;Hrs&#41;</td>
            <td>Permisos &#40;Hrs&#41;</td>
            <td>Horas extra &#40;Hrs&#41;</td>
        </tr>
        <tr>
            <td><span id="asistencia_1">'.$gestion.'</span></td>
            <td><span id="asistencia_2">'.$mes.'</span></td>
            <td><span id="asistencia_3">'.$t_laborado.'</span></td>
            <td><span id="asistencia_4">'.$horas_laboradas.'</span></td>
            <td><span id="asistencia_5">'.$tardanza.'</span></td>
            <td><span id="asistencia_6">'.$permiso.'</span></td>
            <td><span id="asistencia_7">'.$horas_extra.'</span></td>
        </tr>
    </table></div>';
    $response['tabla'] = $tabla;
    $response['horas_extra'] = $horas_extra;
    return $response;
    }
    public function boletas()
    {
        return view('planilla.generar_boletas');
    }
    public function generar_boletas(Request $request)
    {
        $anio = $request->anio;
        $mes = $request->mes;
        $empresa = Empresa::first();

        $planilla = Planilla::join('personals','personals.id','planillas.personal_id')
                                ->join('contratacions','personals.id','contratacions.personal_id')
                                ->join('pais','pais.id','personals.pais_id')
                                ->join('cargos','cargos.id','personals.cargo_id')
                                ->where('planillas.mes',$mes)
                                ->where('planillas.anio',$anio)
                                ->where('planillas.estado','Activo')
                                ->orderBy('personals.primer_apellido','asc')
                                ->get();

        return view('planilla.boleta')
                    ->with('anio',$anio)
                    ->with('mes',$mes)
                    ->with('empresa',$empresa)
                    ->with('planilla',$planilla);
    }
}
