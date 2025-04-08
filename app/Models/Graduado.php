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
    ];

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function graduacionEncuestaSeguimientoTrayectoriaLaboralEstudioPosteriorRedProfesionalSatisfaccionEgresadoEventoGraduados(): HasMany
    {
        return $this->hasMany(GraduacionEncuestaSeguimientoTrayectoriaLaboralEstudioPosteriorRedProfesionalSatisfaccionEgresadoEventoGraduado::class);
    }
}
