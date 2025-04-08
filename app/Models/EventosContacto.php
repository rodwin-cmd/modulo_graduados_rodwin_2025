<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventosContacto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_eventos',
        'tipo_evento',
        'fecha_evento',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_eventos' => 'integer',
        'fecha_evento' => 'datetime',
    ];

    public function graduados(): BelongsToMany
    {
        return $this->belongsToMany(Graduados::class);
    }
}
