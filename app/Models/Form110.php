<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Form110
 *
 * @property $id
 * @property $personal_id
 * @property $descripcion
 * @property $mes
 * @property $periodo
 * @property $monto_favor
 * @property $form110
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal $personal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Form110 extends Model
{

    static $rules = [
		'personal_id' => 'required',
		'descripcion' => 'required',
		'mes' => 'required',
		'periodo' => 'required',
		'monto_favor' => 'required',
		'form110' => 'required',
        'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['personal_id','descripcion','mes','periodo','monto_favor','form110','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personal()
    {
        return $this->hasOne('App\Models\Personal', 'id', 'personal_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
