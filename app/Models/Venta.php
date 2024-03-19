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
    protected $perPage = 200;

    /**
     * Reglas de validación.
     *
     * @var array
     */
    public static $rules = [
        'id_tramite' => 'required',
        'cliente' => 'required',
        'celular' => 'required',
        'costo' => 'nullable',
        'precio_venta' => 'nullable',
        'forma_pago' => 'nullable',
        'tardanza' => 'nullable',
        'dato1' => 'nullable',
        'dato2' => 'nullable',
        'dato3' => 'nullable', 
        'dato4' => 'nullable',
        'observaciones' => 'nullable',
        'id_estado' => 'required',
    ];

    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'id_tramite',
        'cliente',
        'celular',
        'costo',
        'precio_venta',
        'forma_pago',
        'tardanza',
        'dato1',
        'dato2',
        'dato3', 
        'dato4',
        'observaciones',
        'id_estado',
    ];




}
