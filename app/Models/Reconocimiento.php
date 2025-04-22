<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Reconocimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'graduado_id',
        'tipo',
        'titulo',
        'descripcion',
        'entidad_otorgante',
        'fecha',
        'archivo',
    ];
// un graduado puede tener muchos reconocimientos
    public function graduado() : BelongsTo
    {
        return $this->belongsTo(Graduado::class);
    }
}
