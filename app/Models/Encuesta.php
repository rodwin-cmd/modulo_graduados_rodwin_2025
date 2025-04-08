<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encuesta extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'fecha_aplicacion' => 'date',
        'fecha_respuesta' => 'date',
        'graduado_id' => 'integer',
    ];

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
