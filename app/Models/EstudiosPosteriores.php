<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstudiosPosteriores extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_estudios_post',
        'graduado_id',
        'nivel_estudios',
        'programa',
        'institucion',
        'pais',
        'ciudad',
        'fecha_inicio',
        'fecha_fin',
        'graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_estudios_post' => 'integer',
        'graduado_id' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'graduados_id' => 'integer',
    ];

    public function graduados(): BelongsTo
    {
        return $this->belongsTo(Graduados::class);
    }
}
