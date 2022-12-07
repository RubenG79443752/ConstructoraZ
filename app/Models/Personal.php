<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personal
 *
 * @property $id
 * @property $doc_identidad
 * @property $nombre
 * @property $primer_apellido
 * @property $segundo_apellido
 * @property $fecha_nacimiento
 * @property $sexo
 * @property $pais_id
 * @property $cargo_id
 * @property $horario_id
 * @property $contratacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cargo $cargo
 * @property Contratacion $contratacion
 * @property Horario $horario
 * @property Pai $pai
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Personal extends Model
{

    static $rules = [
		'doc_identidad' => 'required',
		'nombre' => 'required',
		'fecha_nacimiento' => 'required',
		'sexo' => 'required',
		'pais_id' => 'required',
		'cargo_id' => 'required',
        'estado' => 'required',
    ];

    protected $perPage = 50;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['doc_identidad','nombre','primer_apellido','segundo_apellido','fecha_nacimiento','sexo','domicilio','pais_id','cargo_id','saldo_anterior','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pai()
    {
        return $this->hasOne('App\Models\Pai', 'id', 'pais_id');
    }


}
