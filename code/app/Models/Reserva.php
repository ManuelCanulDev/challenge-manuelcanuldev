<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reserva
 *
 * @property $id
 * @property $socio_id
 * @property $fecha_reserva
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Butaca[] $butacas
 * @property Socio $socio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reserva extends Model
{
    use SoftDeletes;

    static $rules = [
		'socio_id' => 'required',
		'fecha_reserva' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['socio_id','fecha_reserva'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function butacas()
    {
        return $this->hasMany('App\Models\Butaca', 'reserva_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socio()
    {
        return $this->hasOne('App\Models\Socio', 'id', 'socio_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) { // before delete() method call this
            foreach ($model->butacas as $butaca) {
                $butaca->delete();
            }
        });
    }


}
