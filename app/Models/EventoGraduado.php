<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventoGraduado extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'evento_contacto_id' => 'integer',
        'graduado_id' => 'integer',
        'evento_contacto_graduado_id' => 'integer',
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
