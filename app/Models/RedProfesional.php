<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedProfesional extends Model
{
    use HasFactory;

    protected $table = 'red_profesionales';
    protected $fillable = [
        'nombre_red',
        'perfil_url',
        'portafolio',
        'curriculum',

    ];

    /**
     * Relación con el graduado (una red profesional pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
