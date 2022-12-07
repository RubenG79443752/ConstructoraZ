<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Variable
 *
 * @property $id
 * @property $descripcion
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Variable extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'valor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','valor'];



}
