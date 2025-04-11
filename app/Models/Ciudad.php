<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';
    protected $fillable = ['nombre', 'departamento_id'];


    /**
     * Relación con el departamento (muchas ciudades pertenecen a un departamento)
     */
    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
}
