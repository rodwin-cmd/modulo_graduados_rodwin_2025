<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
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
// Relacion uno a muchos, una facultad tiene muchos graduados
    public function graduados():HasMany
    {
        return $this->hasMany(Graduado::class);
    }
    public static function getForm() :array
    {
        return [
                TextInput::make('nombre')
                ->label('Nombre de la nueva Facultad')
                ->required()
                ->maxLength(100),
                TextInput::make('codigo')
                ->label('Codigo')
        ];
    }


}
