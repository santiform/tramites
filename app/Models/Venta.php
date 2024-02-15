<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $tipo_tramite
 * @property $cliente
 * @property $costo
 * @property $precio_venta
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'tipo_tramite' => 'required',
		'cliente' => 'required',
		'costo' => 'nullable',
		'precio_venta' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_tramite','cliente','costo','precio_venta','estado'];



}
