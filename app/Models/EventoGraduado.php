<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventoGraduado extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'evento_id',
        'graduado_id',
        'eventos_contacto_graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'evento_id' => 'integer',
        'graduado_id' => 'integer',
        'eventos_contacto_graduados_id' => 'integer',
    ];

    public function eventosContactoGraduados(): BelongsTo
    {
        return $this->belongsTo(EventosContactoGraduados::class);
    }
}
