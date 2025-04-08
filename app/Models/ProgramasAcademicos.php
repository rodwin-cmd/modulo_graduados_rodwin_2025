<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramasAcademicos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idPrograma',
        'programa',
        'facultad',
        'nivel',
        'modalidad',
        'codigo_SNIES',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idPrograma' => 'integer',
    ];

    public function graduaciones(): HasMany
    {
        return $this->hasMany(Graduaciones::class);
    }
}
