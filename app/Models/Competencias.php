<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competencias extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_competencias',
        'encuesta_id',
        'nivel_competencias',
        'encuestas_seguimiento_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_competencias' => 'integer',
        'encuesta_id' => 'integer',
        'encuestas_seguimiento_id' => 'integer',
    ];

    public function encuestasSeguimiento(): BelongsTo
    {
        return $this->belongsTo(EncuestasSeguimiento::class);
    }
}
