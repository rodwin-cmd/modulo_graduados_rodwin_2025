<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Graduacion extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'graduado_id' => 'integer',
        'programa_id' => 'integer',
        'fecha_grado' => 'date',
        'graduado_programa_academico_id' => 'integer',
    ];

    public function graduadoProgramaAcademico(): BelongsTo
    {
        return $this->belongsTo(GraduadoProgramaAcademico::class);
    }

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }

    public function programa(): BelongsTo
    {
        return $this->belongsTo(Programa::class);
    }
}
