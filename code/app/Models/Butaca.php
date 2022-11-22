<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Butaca
 *
 * @property $id
 * @property $reserva_id
 * @property $butaca_fila
 * @property $butaca_columna
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Reserva $reserva
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Butaca extends Model
{
    use SoftDeletes;

    static $rules = [
		'reserva_id' => 'required',
		'butaca_fila' => 'required',
		'butaca_columna' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reserva_id','butaca_fila','butaca_columna'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reserva()
    {
        return $this->hasOne('App\Models\Reserva', 'id', 'reserva_id');
    }
    

}
