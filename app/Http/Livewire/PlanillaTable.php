<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Planilla;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
class PlanillaTable extends DataTableComponent
{
    protected $model = Planilla::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setPerPageAccepted([15, 25, 50, 100]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "personal.nombre")
                ->sortable()
                ->searchable(),
            Column::make("Primer apellido", "personal.primer_apellido")
                ->sortable()
                ->searchable(),
            Column::make("Segundo apellido", "personal.segundo_apellido")
                ->sortable()
                ->searchable(),
            Column::make("Mes", "mes")
                ->sortable(),
            Column::make("Anio", "anio")
                ->sortable(),
            Column::make("Horas pagadas", "horas_pagadas")
                ->sortable(),
            Column::make("Dias pagados", "dias_pagados")
                ->sortable(),
            Column::make("Haber basico", "haber_basico")
                ->sortable(),
            Column::make("Bono antiguedad", "bono_antiguedad")
                ->sortable(),
            Column::make("Trabajo extra nocturno", "trabajo_extra_nocturno")
                ->sortable(),
            Column::make("Total ganado", "total_ganado")
                ->sortable(),
            Column::make("Afps", "afps")
                ->sortable(),
            Column::make("Rc iva", "rc_iva")
                ->sortable(),
            Column::make("Total descuentos", "total_descuentos")
                ->sortable(),
            Column::make("Liquido pagable", "liquido_pagable")
                ->sortable(),
            Column::make(" ", "id")
                ->view('planilla.actions'),
        ];
    }
}
