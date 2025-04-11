<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramaAcademico extends Model
{
    use HasFactory;

    protected $fillable = [
        'programa',
        'facultad',
        'nivel',
        'modalidad',
        'codigo_SNIES',
    ];

    /**
     * Relación con los graduados (un programa académico puede tener muchos graduados)
     */
    public function graduados(): HasMany
    {
        return $this->hasMany(Graduado::class);
    }
}
