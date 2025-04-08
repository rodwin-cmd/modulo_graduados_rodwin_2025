<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EncuestaSeguimiento extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'graduado_id' => 'integer',
        'anio_aplicacion' => 'date',
        'fecha_respuesta' => 'date',
    ];

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }

    public function competenciaSatisfaccionEgresados(): HasMany
    {
        return $this->hasMany(CompetenciaSatisfaccionEgresado::class);
    }
}
