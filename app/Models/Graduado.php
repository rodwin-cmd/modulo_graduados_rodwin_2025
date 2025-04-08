<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Graduado extends Model
{
    use HasFactory;

    protected $primaryKey = 'numero_documento';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $casts = [
        'id' => 'integer',
        'numero_documento' => 'integer',
        'fecha_nacimiento' => 'date',
        'ciudad_id' => 'integer',
        'programa_academico_id' => 'integer',
    ];

public function encuestas(): HasMany
{
    return $this->hasMany(Encuesta::class);
}

    public function trayectoriasLaborales(): HasMany
    {
        return $this->hasMany(TrayectoriaLaboral::class);
    }

    public function estudios(): HasMany
    {
        return $this->hasMany(Estudios::class);
    }

    public function redesProfesionales(): HasMany
    {
        return $this->hasMany(RedProfesional::class);
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function programaAcademico(): BelongsTo
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }
}
