<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación con las ciudades (un departamento tiene muchas ciudades)
     */
    public function ciudades(): HasMany
    {
        return $this->hasMany(Ciudad::class);
    }
}
