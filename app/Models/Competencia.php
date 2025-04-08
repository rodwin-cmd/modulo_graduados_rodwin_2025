<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competencia extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'encuesta_id' => 'integer',
        'encuesta_seguimiento_id' => 'integer',
    ];

    public function encuestaSeguimiento(): BelongsTo
    {
        return $this->belongsTo(EncuestaSeguimiento::class);
    }

    public function encuesta(): BelongsTo
    {
        return $this->belongsTo(Encuesta::class);
    }
}
