<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $logo
 * @property $razon_social
 * @property $n_nit
 * @property $n_identificador
 * @property $n_empleador_caja
 * @property $nim
 * @property $repre_legal
 * @property $ci_repre_legal
 * @property $direccion
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{

    static $rules = [
		'logo' => 'required|image|max:2048',
		'razon_social' => 'required',
		'n_nit' => 'required',
		'n_identificador' => 'required',
		'n_empleador_caja' => 'required',
		'nim' => 'required',
		'repre_legal' => 'required',
		'ci_repre_legal' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['logo','razon_social','n_nit','n_identificador','n_empleador_caja','nim','repre_legal','ci_repre_legal','direccion','telefono'];



}
