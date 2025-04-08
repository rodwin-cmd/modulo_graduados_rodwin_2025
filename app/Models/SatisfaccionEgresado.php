<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SatisfaccionEgresado extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_satisfaccion',
        'encuesta_id',
        'satisfacion_formacion_acad',
        'recomendacion_programa',
        'comentarios_adicionales',
        'encuestas_seguimiento_graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_satisfaccion' => 'integer',
        'encuesta_id' => 'integer',
        'recomendacion_programa' => 'boolean',
        'encuestas_seguimiento_graduados_id' => 'integer',
    ];

    public function encuestasSeguimientoGraduados(): BelongsTo
    {
        return $this->belongsTo(EncuestasSeguimientoGraduados::class);
    }
}
