<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrayectoriaLaboral extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_trayectoria',
        'graduado_id',
        'empresa',
        'cargo',
        'sector',
        'ciudad',
        'pais',
        'area_desempeno',
        'fecha_inicio',
        'fecha_fin',
        'relacion_formacion',
        'graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_trayectoria' => 'integer',
        'graduado_id' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'relacion_formacion' => 'boolean',
        'graduados_id' => 'integer',
    ];

    public function graduados(): BelongsTo
    {
        return $this->belongsTo(Graduados::class);
    }
}
