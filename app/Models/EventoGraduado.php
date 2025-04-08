<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventoGraduado extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'graduado_id',
        'nombre_evento',
        'lugar_evento',
        'fecha_evento',
        'descripcion_evento',
        'asistio',
    ];

    public function eventoContactoGraduado(): BelongsTo
    {
        return $this->belongsTo(EventoContactoGraduado::class);
    }

    public function eventoContacto(): BelongsTo
    {
        return $this->belongsTo(EventoContacto::class);
    }

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
