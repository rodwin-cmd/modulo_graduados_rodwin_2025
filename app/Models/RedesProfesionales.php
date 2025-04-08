<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedesProfesionales extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_redesp',
        'graduado_id',
        'red_social',
        'url_red_social',
        'graduados_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_redesp' => 'integer',
        'graduado_id' => 'integer',
        'graduados_id' => 'integer',
    ];

    public function graduados(): BelongsTo
    {
        return $this->belongsTo(Graduados::class);
    }
}
