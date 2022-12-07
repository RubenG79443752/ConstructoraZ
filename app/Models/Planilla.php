<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Planilla
 *
 * @property $id
 * @property $mes
 * @property $anio
 * @property $horas_pagadas
 * @property $dias_pagados
 * @property $haber_basico
 * @property $bono_antiguedad
 * @property $trabajo_extra_nocturno
 * @property $total_ganado
 * @property $afps
 * @property $rc_iva
 * @property $otros_descuentos
 * @property $total_descuentos
 * @property $liquido_pagable
 * @property $personal_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal $personal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Planilla extends Model
{

    static $rules = [
		'mes' => 'required',//
		'anio' => 'required',
		'horas_pagadas' => 'required',
		'dias_pagados' => 'required',
		'haber_basico' => 'required',
		'bono_antiguedad' => 'required',
		'trabajo_extra_nocturno' => 'required',
		'total_ganado' => 'required',
		'afps' => 'required',
		'rc_iva' => 'required',
		'otros_descuentos' => 'required',
		'total_descuentos' => 'required',
		'liquido_pagable' => 'required',
		'personal_id' => 'required',//
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mes','anio','horas_pagadas','dias_pagados','haber_basico','bono_antiguedad','trabajo_extra_nocturno','total_ganado','afps','rc_iva','otros_descuentos','total_descuentos','liquido_pagable','personal_id','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personal()
    {
        return $this->hasOne('App\Models\Personal', 'id', 'personal_id');
    }


}
