<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EncuestasSeguimiento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_encuestas',
        'graduado_id',
        'anio_aplicacion',
        'fecha_respuesta',
        'tipo_encuesta',
        'medio_aplicacion',
        'graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_encuestas' => 'integer',
        'graduado_id' => 'integer',
        'anio_aplicacion' => 'datetime',
        'fecha_respuesta' => 'datetime',
        'graduados_id' => 'integer',
    ];

    public function graduados(): BelongsTo
    {
        return $this->belongsTo(Graduados::class);
    }

    public function competenciasSatisfaccionEgresados(): HasMany
    {
        return $this->hasMany(CompetenciasSatisfaccionEgresado::class);
    }
}
