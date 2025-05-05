<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nivel_estudios',
        'programa',
        'institucion',
        'fecha_inicio',
        'fecha_fin',
        'graduado_id',
        'facultad_id'
    ];

    /**
     * Relación con el graduado (un estudio pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }

    /**
     * Relación con facultad (un estudio pertenece a una facultad)
     */
    public function facultad(): BelongsTo
    {
        return $this->belongsTo(Facultad::class);
    }


}
