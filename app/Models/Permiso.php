<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 *
 * @property $id
 * @property $personal_id
 * @property $tipo_permiso
 * @property $descripcion
 * @property $desde_fecha
 * @property $hasta_fecha
 * @property $horas
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal $personal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permiso extends Model
{

    static $rules = [
		'personal_id' => 'required',
        'justificativo' => 'required',
		'tipo_permiso' => 'required',
		'descripcion' => 'required',
		'desde_fecha' => 'required',
		'hasta_fecha' => 'required',
		'horas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['personal_id','justificativo','tipo_permiso','descripcion','desde_fecha','hasta_fecha','horas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personal()
    {
        return $this->hasOne('App\Models\Personal', 'id', 'personal_id');
    }


}
