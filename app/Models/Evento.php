<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'nombre_evento' => 'string',
        'descripcion' => 'string',
        'ciudad_evento' => 'string',
        'lugar_evento' => 'string',
        'fecha_evento' => 'date',
    ];

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class, 'graduado_numero_documento', 'numero_documento');
    }
}
