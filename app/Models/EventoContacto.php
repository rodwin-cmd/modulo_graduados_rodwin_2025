<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventoContacto extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'fecha_evento' => 'date',
    ];

    public function graduados(): BelongsToMany
    {
        return $this->belongsToMany(Graduado::class);
    }
}
