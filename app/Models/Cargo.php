<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 *
 * @property $id
 * @property $cargo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargo extends Model
{
    
    static $rules = [
		'cargo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo'];



}
