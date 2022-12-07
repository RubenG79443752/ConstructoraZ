<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 *
 * @property $id
 * @property $rol
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rol extends Model
{

    static $rules = [
		'nombre_rol' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_rol'];



}
