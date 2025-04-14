<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrayectoriaLaboral extends Model
{
    use HasFactory;
    protected $table = 'trayectoria_laborales';
    protected $fillable = [
        'empresa',
        'direccion',
        'cargo',
        'sector_productivo',
        'ciudad',
        'pais',
        'area_desempeno',
        'fecha_inicio',
        'fecha_fin',
        'relacion_formacion',

    ];

    // manejo de tipos elocuent
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'relacion_formacion' => 'boolean',
    ];

    /**
     * Relación con el graduado (una trayectoria laboral pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
