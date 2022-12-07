<?php

namespace App\Imports;

use App\Models\Asistencia;
use Maatwebsite\Excel\Concerns\ToModel;

class AsistenciaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asistencia([
            'personal_id' => $row[0],
            'lugartrabajo_id' => $row[1],
            'fecha_asitencia' => $row[2],
            'hora_entrada' => $row[3],
            'long_entrada' => $row[4],
            'lat_entrada' => $row[5],
            'estado_entrada' => $row[6],
            'hora_salida' => $row[7],
            'long_salida' => $row[8],
            'lat_salida' => $row[9],
            'estado_salida' => $row[10],
            'tardanza' => $row[11],
            'tiempo_laborado' => $row[12],
            'tipo_asistencia' => $row[13],
            'estado_final' => $row[14]
        ]);
    }
}
