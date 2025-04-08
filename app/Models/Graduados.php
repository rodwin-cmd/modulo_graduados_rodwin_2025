<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Graduados extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idgraduado',
        'nombre',
        'apellidos',
        'tipo_documento',
        'numero_documento',
        'sexo',
        'fecha_nacimiento',
        'correo_personal',
        'correo_institucional',
        'telefono',
        'direccion',
        'ciudad_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idgraduado' => 'integer',
        'fecha_nacimiento' => 'datetime',
        'ciudad_id' => 'integer',
    ];

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function graduacionesEncuestasSeguimientoTrayectoriaLaboralEstudiosPosterioresRedesProfesionales(): HasMany
    {
        return $this->hasMany(GraduacionesEncuestasSeguimientoTrayectoriaLaboralEstudiosPosterioresRedesProfesionales::class);
    }
}
