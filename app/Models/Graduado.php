<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Graduado extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'numero_documento' => 'integer',
        'fecha_nacimiento' => 'date',
        'ciudad_id' => 'integer',
        'programa_academico_id' => 'integer',
    ];

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function programaAcademico(): BelongsTo
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }

    public function encuestaTrayectoriaLaboralEstudioRedProfesionalEventos(): HasMany
    {
        return $this->hasMany(EncuestaTrayectoriaLaboralEstudioRedProfesionalEvento::class);
    }
}
