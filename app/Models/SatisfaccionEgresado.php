<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SatisfaccionEgresado extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'encuesta_id' => 'integer',
        'graduado_id' => 'integer',
        'recomendacion_programa' => 'boolean',
        'encuesta_seguimiento_graduado_id' => 'integer',
    ];

    public function encuestaSeguimientoGraduado(): BelongsTo
    {
        return $this->belongsTo(EncuestaSeguimientoGraduado::class);
    }

    public function encuesta(): BelongsTo
    {
        return $this->belongsTo(Encuesta::class);
    }

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
