<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Venta extends Model
{
    protected $perPage = 200;

    /**
     * Reglas de validación.
     *
     * @var array
     */
    public static $rules = [
        'token' => 'nullable',
        'id_tramite' => 'required',
        'cliente' => 'required',
        'celular' => 'required',
        'vendedor' => 'nullable',
        'costo' => 'nullable',
        'precio_venta' => 'nullable',
        'forma_pago' => 'nullable',
        'estado_pago' => 'nullable',
        'tardanza' => 'nullable',
        'dato1' => 'nullable',
        'dato2' => 'nullable',
        'dato3' => 'nullable', 
        'dato4' => 'nullable',
        'dato5' => 'nullable',
        'dato6' => 'nullable',
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
        'vendedor',
        'costo',        
        'precio_venta',
        'forma_pago',
        'estado_pago',
        'tardanza',
        'dato1',
        'dato2',
        'dato3', 
        'dato4',
        'dato5',
        'dato6',
        'observaciones',
        'id_estado',
        'token', // Agregamos el token al fillable
    ];

    /**
     * Evento boot para generar el token único cuando se crea un registro.
     */
    protected static function boot()
    {
        parent::boot();

        // Generar un token único antes de guardar el modelo
        static::creating(function ($venta) {
            $venta->token = self::generateUniqueToken();
        });
    }

    /**
     * Generar un token único de 6 caracteres.
     */
    public static function generateUniqueToken()
    {
        do {
            // Generamos un token de 6 caracteres aleatorios
            $token = Str::random(8);
        } while (self::where('token', $token)->exists());

        return $token;
    }
}
