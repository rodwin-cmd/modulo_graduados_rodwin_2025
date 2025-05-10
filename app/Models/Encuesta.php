<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_aplicacion',
        'tipo_encuesta',
        'medio_aplicacion',
        'url',
    ];

    /**
     * Relación con el graduado (una encuesta pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }

    /**
     * Evento que se ejecuta después de guardar una encuesta
     * Cada vez que una encuesta es creada o actualizada, se ejecuta el evento saved.
     * Se verifica si hay un graduado relacionado.
     * Si lo hay, se actualiza su campo ultima_actualizacion con now() (la fecha y hora actual).
     */
    protected static function booted(): void
    {
        static::saved(function (Encuesta $encuesta) {
            if ($encuesta->graduado) {
                $encuesta->graduado->ultima_actualizacion = now();
                $encuesta->graduado->save();
            }
        });
    }
}
