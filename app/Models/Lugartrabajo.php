<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lugartrabajo
 *
 * @property $id
 * @property $personal_id
 * @property $descripcion
 * @property $logitud
 * @property $latitud
 * @property $radio
 * @property $apertura_marcado
 * @property $cierre_marcado
 * @property $minutos_espera
 * @property $dias_trabajo
 * @property $user_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal $personal
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lugartrabajo extends Model
{

    static $rules = [

		'descripcion' => 'required',
		'logitud' => 'required',
		'latitud' => 'required',
		'radio' => 'required',
		'apertura_marcado' => 'required',
		'cierre_marcado' => 'required',
        'turno' => 'required',
		'minutos_espera' => 'required',
		'dias_trabajo' => 'required',
		'user_id' => 'required',
		'estado' => 'required',
    ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
        'logitud',
        'latitud',
        'radio',
        'apertura_marcado',
        'cierre_marcado',

        'inicio_desde',
        'inicio_hasta',
        'fin_desde',
        'fin_hasta',
        'turno',

        'horario_id',

        'minutos_espera',
        'dias_trabajo',
        'user_id',
        'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horario()
    {
        return $this->hasOne('App\Models\Horario', 'id', 'horario_id');
    }


}
