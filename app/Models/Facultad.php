<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultades';
    protected $fillable = ['nombre', 'codigo'];

    public function programas():HasMany
    {
        return $this->hasMany(ProgramaAcademico::class);
    }
}
