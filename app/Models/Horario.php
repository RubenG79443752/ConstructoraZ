<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property $id
 * @property $horario_ini
 * @property $horario_fin
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horario extends Model
{

    static $rules = [
        'nombre' => 'required',
		'horario_ini' => 'required',
		'horario_fin' => 'required',
        'horas_descanso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','horario_ini','horario_ini1','horario_fin1','horario_fin','horas_descanso'];



}
