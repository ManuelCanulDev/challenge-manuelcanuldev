<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Socio
 *
 * @property $id
 * @property $DNI
 * @property $nombre
 * @property $apellido
 * @property $alta
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Reserva[] $reservas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Socio extends Model
{
    use SoftDeletes;

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    static $rules = [
        'DNI' => 'required|unique:socios,DNI',
        'nombre' => 'required',
        'apellido' => 'required',
        'alta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI', 'nombre', 'apellido', 'alta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'socio_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->reservas()->delete();
             // do the rest of the cleanup...
        });
    }
}
