<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $lugartrabajo_id
 * @property $fecha_asitencia
 * @property $hora_entrada
 * @property $long_entrada
 * @property $lat_entrada
 * @property $estado_entrada
 * @property $hora_salida
 * @property $long_salida
 * @property $lat_salida
 * @property $estado_salida
 * @property $tardanza
 * @property $tiempo_laborado
 * @property $tipo_asistencia
 * @property $estado_final
 * @property $created_at
 * @property $updated_at
 *
 * @property Lugartrabajo $lugartrabajo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{

    static $rules = [
        'personal_id' => 'required',
		'lugartrabajo_id' => 'required',
		'fecha_asitencia' => 'required',
		'hora_entrada' => 'required',
		'estado_entrada' => 'required',
    ];
    static $ruless = [
        'hora_salida' => 'required',
        'lat_salida' => 'required',
		'long_salida' => 'required',
        'estado_salida' => 'required',
		'tipo_asistencia' => 'required',

    ];

    protected $perPage = 70;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['personal_id','lugartrabajo_id','fecha_asitencia','hora_entrada','long_entrada','lat_entrada','estado_entrada','hora_salida','long_salida','lat_salida','estado_salida','tardanza','tiempo_laborado','tipo_asistencia','estado_final'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lugartrabajo()
    {
        return $this->hasOne('App\Models\Lugartrabajo', 'id', 'lugartrabajo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personal()
    {
        return $this->hasOne('App\Models\Personal', 'id', 'personal_id');
    }



}
