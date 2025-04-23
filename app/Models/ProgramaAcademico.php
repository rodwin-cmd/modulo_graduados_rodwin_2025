<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramaAcademico extends Model
{
    use HasFactory;

    protected $fillable = [
        'programa',
        'facultad_id',
        'nivel',
        'modalidad',
        'codigo_SNIES',
    ];

    /**
     * Relación con los graduados (un programa académico puede tener muchos graduados)
     */
    public function graduados(): HasMany
    {
        return $this->hasMany(Graduado::class);
    }
    /**
     * Relación con los facultad (un programa académico pertenece a una facultad)
     */
    public function facultad():BelongsTo
    {
        return $this->belongsTo(Facultad::class);
    }
    public static function getForm() :array
    {
        return [

            TextInput::make('programa')
                ->required()
                ->maxLength(255),
            TextInput::make('facultad')
                ->required()
                ->maxLength(255),
            TextInput::make('nivel')
                ->required()
                ->maxLength(255),
            TextInput::make('modalidad')
                ->required()
                ->maxLength(255),
            TextInput::make('codigo_SNIES')
                ->numeric(),
        ];
    }
}
