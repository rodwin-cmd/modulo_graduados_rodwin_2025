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
        'fecha_respuesta',
        'tipo_encuesta',
        'medio_aplicacion',

    ];

    /**
     * Relación con el graduado (una encuesta pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
