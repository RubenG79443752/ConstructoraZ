<?php

namespace App\Exports;

use App\Models\Asistencia;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsistenciaOffExport implements FromCollection
{
    protected $mes;

    public function __construct($mes)
    {
        $this->mes = $mes;
    }
    public function collection()
    {
        $periodo = date('Y');

        return Asistencia::select('personal_id','lugartrabajo_id','fecha_asitencia','hora_entrada','long_entrada','lat_entrada','estado_entrada','hora_salida','long_salida','lat_salida','estado_salida','tardanza','tiempo_laborado','tipo_asistencia','estado_final')
                        ->whereMonth('fecha_asitencia',$this->mes)
                        ->whereYear('fecha_asitencia',$periodo)
                        ->where('tipo_asistencia','Offline')
                        ->get();
    }
}
