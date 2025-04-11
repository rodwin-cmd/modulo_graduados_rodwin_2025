<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_evento' ,
        'descripcion',
        'ciudad_evento',
        'departamento_evento',
        'lugar_evento',
        'fecha_evento',
        'graduado_id',
    ];
    /**
     * Relación con el graduado (un evento pertenece a un graduado)
     */
    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
