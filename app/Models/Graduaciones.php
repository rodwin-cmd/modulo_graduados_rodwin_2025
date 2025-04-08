<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Graduaciones extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_graduaciones',
        'graduado_id',
        'programa_id',
        'fecha_grado',
        'promediofinal',
        'mencion_honorifica',
        'graduados_programas_academicos_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_graduaciones' => 'integer',
        'graduado_id' => 'integer',
        'programa_id' => 'integer',
        'fecha_grado' => 'datetime',
        'graduados_programas_academicos_id' => 'integer',
    ];

    public function graduadosProgramasAcademicos(): BelongsTo
    {
        return $this->belongsTo(GraduadosProgramasAcademicos::class);
    }
}
