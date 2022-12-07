<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pai
 *
 * @property $id
 * @property $pais
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pai extends Model
{
    
    static $rules = [
		'pais' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pais'];



}
