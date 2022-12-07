<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Personal;
use App\Models\Lugartrabajo;
use App\Models\Horario;
use App\Exports\AsistenciasExport;
use App\Exports\AsistenciaOffExport;
use App\Imports\AsistenciaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Location\Coordinate;
use Location\Distance\Vincenty;
use DateTime;
/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha = date('Y-m-d');


        $nom = Auth::user()->name;
            $aux = explode('[',$nom);
            $personal = [];
            $id_personal = 0;
            if (strpos($nom,'[')) {
                $pid = $aux[1];
                $id = explode(']',$pid);
                $id_personal = $id[0];
                $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('id',$id_personal)->where('estado','Activo')->pluck('nombre','id');

            }
        $asistencia = Asistencia::where('fecha_asitencia',$fecha)->where('personal_id',$id_personal)->first();
        if ($asistencia == null) {
            $asistencia = new Asistencia();

            $lugartrabajo = Lugartrabajo::pluck('descripcion','id');
            $accion = 'insertar';


            return view('asistencia.create', compact('accion','asistencia','lugartrabajo','personal'));
        }else{
            return redirect()->route('asistencias.edit',$asistencia->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);
        //$asistencia = Asistencia::create($request->all());
        $lugartrabajo = Lugartrabajo::where('id',$request->lugartrabajo_id)->first();
        $asistencia = new Asistencia();
        //Entrada
        $asistencia->personal_id = $request->personal_id;
        $asistencia->lugartrabajo_id = $request->lugartrabajo_id;
        $asistencia->fecha_asitencia = $request->fecha_asitencia;
        $asistencia->hora_entrada = $request->hora_entrada;
        $asistencia->long_entrada = $request->long_entrada;
        $asistencia->lat_entrada = $request->lat_entrada;

        $desde=new DateTime($lugartrabajo->inicio_desde);
        $hasta=new DateTime($lugartrabajo->inicio_hasta);
        $hora_marcada = new DateTime($request->hora_entrada);

        $hrs = 0;
        $min = 0;
        $tardanza = 0;

        $coordinate1 = new Coordinate($lugartrabajo->latitud, $lugartrabajo->logitud);
        $coordinate2 = new Coordinate($request->lat_entrada, $request->long_entrada);
        $calculator = new Vincenty();
        $distancia = $calculator->getDistance($coordinate1, $coordinate2);
        if($hora_marcada <= $hasta){
            if($distancia <= $lugartrabajo->radio){
                $asistencia->estado_entrada = 'Correcto';
            }
            else{
                $asistencia->estado_entrada = 'Fuera_de_area';
            }
        }
        else{
            if($distancia <= $lugartrabajo->radio){
                $asistencia->estado_entrada = 'Tardanza';
            }
            else{
                $asistencia->estado_entrada = 'Fuera_de_area';
            }
            $hrs = $hora_marcada->diff($hasta)->format("%h");
            $min = $hora_marcada->diff($hasta)->format("%i")/60;
            $tardanza = $hrs + $min;
        }

        //salida
        $asistencia->hora_salida = $request->hora_salida;
        $asistencia->long_salida = $request->long_salida;
        $asistencia->lat_salida = $request->lat_salida;
        $asistencia->estado_salida = $request->estado_salida;

        //calculo
        $asistencia->tardanza = $tardanza;
        $asistencia->tiempo_laborado = 0;
        $asistencia->tipo_asistencia = $request->tipo_asistencia;
        $asistencia->estado_final = 'Presente';
        $asistencia->save();


        return redirect()->route('asistencias.create')
            ->with('success', 'Marco su entrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);
        $nom = Auth::user()->name;
        $aux = explode('[',$nom);
        $personal = [];
        if (strpos($nom,'[')) {
            $pid = $aux[1];
            $id = explode(']',$pid);
            $id_personal = $id[0];
            $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('id',$id_personal)->where('estado','Activo')->pluck('nombre','id');

        }
        $lugartrabajo = Lugartrabajo::pluck('descripcion','id');
        $accion = 'modificar';
        return view('asistencia.edit', compact('accion','asistencia','lugartrabajo','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$ruless);

        $asistencia = Asistencia::find($request->asistencia_id);

        $lugartrabajo = Lugartrabajo::where('id',$asistencia->lugartrabajo_id)->first();

        //salida
        $asistencia->hora_salida = $request->hora_salida;
        $asistencia->long_salida = $request->long_salida;
        $asistencia->lat_salida = $request->lat_salida;

        $desde=new DateTime($lugartrabajo->fin_desde);
        $hora_salida=new DateTime($request->hora_salida);

        $coordinate1 = new Coordinate($lugartrabajo->latitud, $lugartrabajo->logitud);
        $coordinate2 = new Coordinate($request->lat_salida, $request->long_salida);
        $calculator = new Vincenty();
        $distancia = $calculator->getDistance($coordinate1, $coordinate2);
        $band = false;
        if ($hora_salida>=$desde) {
            if($distancia <= $lugartrabajo->radio){
                $asistencia->estado_salida = 'Correcto';
            }
            else{
                $asistencia->estado_salida = 'Fuera_de_area';
                $band = true;
            }
        }else{
            $asistencia->estado_salida = 'Salida_adelantada';
        }
        // total horas trabajadas
        $horario = Horario::where('id',$lugartrabajo->horario_id)->first();

        $horario_ini = $horario->horario_ini;
        $hora_salida = $request->hora_salida;
        $date1=new DateTime($horario_ini);
        $date2=new DateTime($hora_salida);
        $diff=$date1->diff($date2);

        $horas_trabajadas = $diff->format("%h") + $diff->format("%i")/60;
        $horas_descanso = $horario->horas_descanso;
        $asistencia->tiempo_laborado = ($band == false)? $horas_trabajadas - $horas_descanso:0;
        ////

        $asistencia->tipo_asistencia = $request->tipo_asistencia;
        $asistencia->estado_final = 'Presente';
        $asistencia->save();

        return redirect()->route('asistencias.create')
            ->with('success', 'Marco su salida');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
    public function menu_asistencia()
    {
        $fecha = date('Y-m-d');
        $tpersonal = Personal::where('estado','Activo')->count();
        $presencia = Asistencia::where('fecha_asitencia',$fecha)->whereIn('estado_entrada',['Correcto','Tardanza'])->count();

        $p = $tpersonal - $presencia;
        $grafico[] = ['name'=>'Asistentes','y'=>floatval($presencia)];
        $grafico[] = ['name'=>'Inasistentes','y'=>floatval($p)];

        return view('asistencia.menu_asistencia',["data" => json_encode($grafico)]);
    }
    public function exportar(){
        return Excel::download(new AsistenciasExport, 'AsistenciaCompleta.xlsx');
        //return Excel::download(new AsistenciasExport,'AsistenciaDelMes.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function exportar_off(Request $request){

        return Excel::download(new AsistenciaOffExport($request->mes), 'AsistenciaDelMes.xlsx');
        //return Excel::download(new AsistenciasExport,'AsistenciaDelMes.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function importar(Request $request){
        Excel::import(new AsistenciaImport, $request->file('import_file'));
        return redirect()->route('asistencias.index')
            ->with('success', 'Archivo importado satisfactoriamente');
    }
    public function index_nomina()
    {
        $asistencias = Asistencia::all();
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $mes = date('m');
        $anio = date('Y');
        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

        $option_mes = $this->option_mes($mes);
        $option_anio = $this->option_anio($anio);
        $tabla = $this->table($anio,$mes,$dias,0);

        //dd($tabla);

        return view('asistencia.nomina', compact('asistencias','tabla','option_mes','option_anio','personal'));
    }
    public function nomina(Request $request)
    {
        $mes = $request->mes;
        $anio = $request->anio;
        $personal_id = ($request->personal_id)? $request->personal_id:0;
        $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
        $asistencias = Asistencia::all();

        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
        $option_mes = $this->option_mes($mes);
        $option_anio = $this->option_anio($anio);
        $tabla = $this->table($anio,$mes,$dias,$personal_id);

        return view('asistencia.nomina', compact('asistencias','tabla','option_mes','option_anio','personal','personal_id'));
    }
    public function option_mes($mes){
        $mes_array = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $m_array = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $m = '';
        for ($i=0; $i < count($mes_array); $i++) {
            if ($m_array[$i] == $mes) {
                $m .= '<option value="'.$m_array[$i].'" selected>'.$mes_array[$i].'</option>';
            }
            $m .= '<option value="'.$m_array[$i].'">'.$mes_array[$i].'</option>';
        }

        return $m;
    }
    public function option_anio($anio){
        $anio_array = ['2022','2023','2024','2025','2026','2027','2028','2029','2030'];
        $a = '';
        for ($i=0; $i < count($anio_array); $i++) {
            if ($anio_array[$i] == $anio) {
                $a .= '<option value="'.$anio_array[$i].'" selected>'.$anio_array[$i].'</option>';
            }
            $a .= '<option value="'.$anio_array[$i].'">'.$anio_array[$i].'</option>';
        }

        return $a;
    }
    public static function table($anio,$mes,$dias,$personal_id = null){
        $dia = ['D','L','M','X','J','V','S'];
        $table = '<div class="table-responsive"><table class="table"><tr><td></td>';
        $count = 0;
        for ($i=1; $i <= $dias; $i++) {
            $fecha = $anio."-".$mes."-".str_pad($i, 2, "0", STR_PAD_LEFT);
            $date = date('w', strtotime($fecha));

            $table .= '<td>'.$dia[$date].'</td>';

        }
        $table .= '</tr><tr><td>Personal</td>';

        for ($i=1; $i <= $dias; $i++) {
            $table .= '<td>'.str_pad($i, 2, "0", STR_PAD_LEFT).'</td>';
        }
        $table .= '</tr>';
        if ($personal_id != 0) {
            $personal = Personal::where('id',$personal_id)->get();
        }else{
            $personal = Personal::all();
        }

        foreach ($personal as $value) {
            $table .= '<tr><td>'.$value->nombre.' '.$value->primer_apellido.' '.$value->segundo_apellido.'</td>';

            for ($i=1; $i <= $dias; $i++) {
                $fecha = $anio."-".$mes."-".str_pad($i, 2, "0", STR_PAD_LEFT);
                $asistencia = Asistencia::where('fecha_asitencia',$fecha)->where('personal_id',$value->id)->first();
                if($asistencia){
                    if($asistencia->estado_entrada == 'Correcto'){
                        $table .= '<td>&#9989;</td>';
                    }
                    else{
                        $table .= '<td>&#8987;</td>';
                    }
                }else{
                    $table .= '<td>&#10060;</td>';
                }

            }
        }
        $table .='</tr></table></div>';

        return $table;

    }
    public function lista_asistenciaOff()
    {
        $asistencias = Asistencia::where('tipo_asistencia','Offline')->paginate();

        return view('asistencia.lista_off', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }
    public function index_asistenciaOff()
    {
        $fecha = date('Y-m-d');

            $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
            $personal_salida = Asistencia::selectRaw('CONCAT ("CI: ",personals.doc_identidad," | ",personals.nombre,"  ",COALESCE(personals.primer_apellido,"")," ",COALESCE(personals.segundo_apellido,"")) AS nombre, asistencias.id')
                                            ->join('personals','asistencias.personal_id','personals.id')
                                            ->where('asistencias.fecha_asitencia',$fecha)
                                            ->whereNull('asistencias.hora_salida')
                                            ->pluck('nombre','asistencias.id');
            $asistencia = new Asistencia();
            $lugartrabajo = Lugartrabajo::pluck('descripcion','id');
            $accion = 'insertar';

            return view('asistencia.asistencia_off', compact('personal','personal_salida','asistencia','lugartrabajo','accion'));

    }
    public function asistenciaOff(Request $request)
    {
        $fecha = date('Y-m-d');

        $band = false;

        for ($i=0; $i < count($request->personal_id); $i++) {
            $asistencia = Asistencia::where('fecha_asitencia',$fecha)
                                        ->where('tipo_asistencia','Offline')
                                        ->where('personal_id',$request->personal_id[$i])
                                        ->first();
            if ($asistencia != null) {
                $band = true;
            }
        }

        if ($band == false) {

            for ($i=0; $i < count($request->personal_id); $i++) {
                $asistencias = new Asistencia();
                $asistencias->personal_id = $request->personal_id[$i];
                $asistencias->lugartrabajo_id = $request->lugartrabajo_id;
                $asistencias->fecha_asitencia = $request->fecha_asitencia;
                $asistencias->hora_entrada = $request->hora_entrada;
                $asistencias->long_entrada = 0;
                $asistencias->lat_entrada = 0;

                $lugartrabajo = LugarTrabajo::find($request->lugartrabajo_id);
                $hasta=new DateTime($lugartrabajo->inicio_hasta);
                $hora_entrada=new DateTime($request->hora_entrada);
                if ($hora_entrada<$hasta) {
                    $asistencias->estado_entrada = 'Correcto';
                    $asistencias->tardanza = 0;
                }else{
                    $asistencias->estado_entrada = 'Tardanza';
                    $diff=$hasta->diff($hora_entrada);
                    $asistencias->tardanza = $diff->format("%h") + $diff->format("%i")/60;
                }

                $asistencias->hora_salida = $request->hora_salida;
                $asistencias->long_salida = 0;
                $asistencias->lat_salida = 0;
                $asistencias->estado_salida = 'Sin_marcar';
                $asistencias->tiempo_laborado = 0;
                $asistencias->tipo_asistencia = 'Offline';
                $asistencias->estado_final = 'Presente';

                $asistencias->save();
            }
            return redirect()->route('index_asistenciaOff')
            ->with('success', 'Se registro asistencia correctamente');
        }
        else{
            return redirect()->route('index_asistenciaOff')
            ->with('danger', 'No puede registrar asistencia por que ya esta en base de datos');
        }

    }
    public function edit_asistenciaOff(Request $request)
    {
        for ($i=0; $i < count($request->personal_id_salida); $i++) {
            $asistencia = Asistencia::find($request->personal_id_salida[$i]);

            $lugartrabajo = LugarTrabajo::find($asistencia->lugartrabajo_id);
            $desde=new DateTime($lugartrabajo->fin_desde);
            $hora_salida=new DateTime($request->hora_salida);

            $asistencia->hora_salida = $request->hora_salida;
            if ($hora_salida>=$desde) {
                $asistencia->estado_salida = 'Correcto';
            }else{
                $asistencia->estado_salida = 'Salida_adelantada';
            }
            // total horas trabajadas
            $horario = Horario::where('id',$lugartrabajo->horario_id)->first();

            $horario_ini = $horario->horario_ini;
            $hora_salida = $request->hora_salida;
            $date1=new DateTime($horario_ini);
            $date2=new DateTime($hora_salida);
            $diff=$date1->diff($date2);

            $horas_trabajadas = $diff->format("%h") + $diff->format("%i")/60;
            $horas_descanso = $horario->horas_descanso;
            $asistencia->tiempo_laborado = $horas_trabajadas - $horas_descanso;
            ////
            $asistencia->save();
        }

        return redirect()->route('index_asistenciaOff')
            ->with('success', 'Marco salida correctamente');
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    public function index_asistenciaAdmin()
    {
        $fecha = date('Y-m-d');

            $personal = Personal::selectRaw('CONCAT ("CI: ",doc_identidad," | ",nombre,"  ",COALESCE(primer_apellido,"")," ",COALESCE(segundo_apellido,"")) AS nombre,id')->where('estado','Activo')->pluck('nombre','id');
            $personal_salida = Asistencia::selectRaw('CONCAT ("CI: ",personals.doc_identidad," | ",personals.nombre,"  ",COALESCE(personals.primer_apellido,"")," ",COALESCE(personals.segundo_apellido,"")) AS nombre, asistencias.id')
                                            ->join('personals','asistencias.personal_id','personals.id')
                                            ->where('asistencias.fecha_asitencia',$fecha)
                                            ->whereNull('asistencias.hora_salida')
                                            ->pluck('nombre','asistencias.id');
            $asistencia = new Asistencia();
            $lugartrabajo = Lugartrabajo::pluck('descripcion','id');
            $accion = 'insertar';

            return view('asistencia.asistencia_admin', compact('personal','personal_salida','asistencia','lugartrabajo','accion'));

    }
    public function asistenciaAdmin(Request $request)
    {
        $fecha = date('Y-m-d');

        $band = false;

        for ($i=0; $i < count($request->personal_id); $i++) {
            $asistencia = Asistencia::where('fecha_asitencia',$fecha)
                                        ->where('tipo_asistencia','Offline')
                                        ->where('personal_id',$request->personal_id[$i])
                                        ->first();
            if ($asistencia != null) {
                $band = true;
            }
        }

        if ($band == false) {

            for ($i=0; $i < count($request->personal_id); $i++) {
                $asistencias = new Asistencia();
                $asistencias->personal_id = $request->personal_id[$i];
                $asistencias->lugartrabajo_id = $request->lugartrabajo_id;
                $asistencias->fecha_asitencia = $request->fecha_asitencia;
                $asistencias->hora_entrada = $request->hora_entrada;
                $asistencias->long_entrada = $request->long_entrada;
                $asistencias->lat_entrada = $request->lat_entrada;

                $lugartrabajo = LugarTrabajo::find($request->lugartrabajo_id);
                $hasta=new DateTime($lugartrabajo->inicio_hasta);
                $hora_entrada=new DateTime($request->hora_entrada);

                $coordinate1 = new Coordinate($lugartrabajo->latitud, $lugartrabajo->logitud);
                $coordinate2 = new Coordinate($request->lat_entrada, $request->long_entrada);
                $calculator = new Vincenty();
                $distancia = $calculator->getDistance($coordinate1, $coordinate2);


                if ($hora_entrada<=$hasta) {
                    if($distancia <= $lugartrabajo->radio){
                        $asistencias->estado_entrada = 'Correcto';
                        $asistencias->tardanza = 0;
                    }
                    else{
                        $asistencias->estado_entrada = 'Fuera_de_area';
                    }

                }else{
                    if($distancia <= $lugartrabajo->radio){
                        $asistencias->estado_entrada = 'Tardanza';
                    }
                    else{
                        $asistencias->estado_entrada = 'Fuera_de_area';
                    }
                    $diff=$hasta->diff($hora_entrada);
                    $asistencias->tardanza = $diff->format("%h") + $diff->format("%i")/60;
                }


                $asistencias->hora_salida = $request->hora_salida;
                $asistencias->long_salida = $request->lat_salida;
                $asistencias->lat_salida = $request->long_salida;
                $asistencias->estado_salida = 'Sin_marcar';
                $asistencias->tiempo_laborado = 0;
                $asistencias->tipo_asistencia = 'Gps';
                $asistencias->estado_final = 'Presente';

                $asistencias->save();
            }
            return redirect()->route('index_asistenciaAdmin')
            ->with('success', 'Se registro asistencia correctamente');
        }
        else{
            return redirect()->route('index_asistenciaAdmin')
            ->with('danger', 'No puede registrar asistencia por que ya esta en base de datos');
        }

    }
    public function edit_asistenciaAdmin(Request $request)
    {
        for ($i=0; $i < count($request->personal_id_salida); $i++) {
            $asistencia = Asistencia::find($request->personal_id_salida[$i]);

            $lugartrabajo = LugarTrabajo::find($asistencia->lugartrabajo_id);
            $desde=new DateTime($lugartrabajo->fin_desde);
            $hora_salida=new DateTime($request->hora_salida);
            $asistencia->hora_salida = $request->hora_salida;
            $asistencia->lat_salida = $request->lat_salida;
            $asistencia->long_salida = $request->long_salida;

            $coordinate1 = new Coordinate($lugartrabajo->latitud, $lugartrabajo->logitud);
            $coordinate2 = new Coordinate($request->lat_salida, $request->long_salida);
            $calculator = new Vincenty();
            $distancia = $calculator->getDistance($coordinate1, $coordinate2);
            $band = false;
            if ($hora_salida>=$desde) {
                if($distancia <= $lugartrabajo->radio){
                    $asistencia->estado_salida = 'Correcto';
                }
                else{
                    $asistencia->estado_salida = 'Fuera_de_area';
                    $band = true;
                }
            }else{
                $asistencia->estado_salida = 'Salida_adelantada';
            }
            // total horas trabajadas
            $horario = Horario::where('id',$lugartrabajo->horario_id)->first();

            $horario_ini = $horario->horario_ini;
            $hora_salida = $request->hora_salida;
            $date1=new DateTime($horario_ini);
            $date2=new DateTime($hora_salida);
            $diff=$date1->diff($date2);

            $horas_trabajadas = $diff->format("%h") + $diff->format("%i")/60;
            $horas_descanso = $horario->horas_descanso;
            $asistencia->tiempo_laborado = ($band == false)? $horas_trabajadas - $horas_descanso:0;
            ////
            $asistencia->save();
        }

        return redirect()->route('index_asistenciaAdmin')
            ->with('success', 'Marco salida correctamente');
    }
}
