<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstudioPosterior extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'graduado_id' => 'integer',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function graduado(): BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
