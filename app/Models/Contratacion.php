<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Contratacion
 *
 * @property $id
 * @property $contrato
 * @property $fecha_ingreso
 * @property $sueldo_inicial
 * @property $garantia
 * @property $empresa_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empresa $empresa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contratacion extends Model
{

    static $rules = [
		'contrato' => 'required|image|max:2048',
        'referencia_contrato' => 'required|max:30',
		'fecha_ingreso' => 'required',
		'sueldo_inicial' => 'required',
		'garantia' => 'required',
		'empresa_id' => 'required',
    ];
    static $ruless = [
		'contrato' => 'image|max:2048',
        'referencia_contrato' => 'required|max:30',
		'fecha_ingreso' => 'required',
		'sueldo_inicial' => 'required',
		'garantia' => 'required',
		'empresa_id' => 'required',
    ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['personal_id','contrato','referencia_contrato','fecha_ingreso','sueldo_inicial','garantia','empresa_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    public function personal()
    {
        return $this->hasOne('App\Models\Personal', 'id', 'personal_id');
    }


}
