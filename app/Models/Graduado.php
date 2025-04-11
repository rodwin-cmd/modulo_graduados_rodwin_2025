<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Graduado extends Model
{
    use HasFactory;


    protected $fillable = [
        'numero_documento',
        'nombre',
        'apellidos',
        'tipo_documento',
        'sexo',
        'fecha_nacimiento',
        'correo_personal',
        'correo_institucional',
        'telefono',
        'direccion',
        'ciudad_id',
        'departamento_id',
        'programa_academico_id',

    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Relación con la ciudad (muchos graduados pertenecen a una ciudad)
     */
    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    /**
     * Relación con la departamento (muchos graduados pertenecen a una departamento)
     */
    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
    /**
     * Relación con el programa académico (muchos graduados pertenecen a un programa académico)
     */
    public function programaAcademico(): BelongsTo
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }

    /**
     * Relación con encuestas (un graduado puede tener muchas encuestas)
     */
    public function encuestas(): HasMany
    {
        return $this->hasMany(Encuesta::class);
    }

    /**
     * Relación con eventos (un graduado puede estar relacionado a muchos eventos)
     */
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
    /**
     * Relación con redes profesionales (un graduado puede tener muchas redes)
     */
    public function redProfesionales(): HasMany
    {
        return $this->hasMany(RedProfesional::class);
    }

    /**
     * Relación con la trayectoria laboral (un graduado puede tener muchas trayectorias laborales)
     */
    public function trayectoriasLaborales()
    {
        return $this->hasMany(TrayectoriaLaboral::class);
    }
}
