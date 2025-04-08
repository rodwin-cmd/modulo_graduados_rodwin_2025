<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramaAcademico extends Model
{
    use HasFactory;

    // Aquí defines qué columnas pueden ser asignadas en masa
    protected $fillable = [
        'id_programa',
        'programa',
        'facultad',
        'nivel',
        'modalidad',
        'codigo_SNIES',
    ];

    // Aquí defines los tipos de las columnas si quieres
    protected $casts = [
        'id' => 'integer',
        'codigo_SNIES' => 'integer',
    ];

    public function graduados(): HasMany
    {
        return $this->hasMany(Graduado::class);
    }
}
