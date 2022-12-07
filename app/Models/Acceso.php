<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acceso
 *
 * @property $id
 * @property $user_id
 * @property $opcion
 * @property $link
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Acceso extends Model
{

    static $rules = [
		'opcion' => 'required',
        'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','opcion','icono','link','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
