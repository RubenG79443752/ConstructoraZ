<?php

namespace App\Exports;

use App\Models\Asistencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use DB;
class AsistenciasExport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
{
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 35,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 15,
        ];
    }
    public function headings(): array
    {
        return [
            'EMPLEADO',
            'FECHA ASISTENCIA',
            'HORA ENTRADA',
            'ESTADO ENTRADA',
            'HORA SALIDA',
            'ESTADO SALIDA',
            'TARDANZA',
            'TIEMPO LABORADO',
            'TIPO ASISTENCIA',
            'ESTADO FINAL'
        ];
    }
    public function collection()
    {
        $mes = date('m');
        $periodo = date('Y');
        return Asistencia::select(
                                DB::raw('CONCAT(nombre," ",primer_apellido," ",segundo_apellido) as empleado'),
                                'fecha_asitencia',
                                'hora_entrada',
                                'estado_entrada',
                                'hora_salida',
                                'estado_salida',
                                'tardanza',
                                'tiempo_laborado',
                                'tipo_asistencia',
                                'estado_final')
                            ->join('lugartrabajos','asistencias.lugartrabajo_id','lugartrabajos.id')
                            ->join('personals','asistencias.personal_id','personals.id')
                            ->whereMonth('fecha_asitencia',$mes)
                            ->whereYear('fecha_asitencia',$periodo)
                            ->get();
    }
}
