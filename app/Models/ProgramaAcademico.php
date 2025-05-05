<?php

namespace App\Models;

use Filament\Forms\Components\Select;
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
     * Relación con las facultades (un programa académico pertenece a una facultad)
     */
    public function facultad():BelongsTo
    {
        return $this->belongsTo(Facultad::class);
    }
    public static function getForm() :array
    {
        return [

            TextInput::make('programa')
                ->label('Nombre del Nuevo Programa Académico')
                ->required()
                ->maxLength(100),
            Select::make('facultad_id')
                ->label('Facultad')
                ->required()
                ->relationship('facultad', 'nombre')
                ->editOptionForm(Facultad::getForm())
                ,
            Select::make('nivel')
                ->required()
                ->options([
                    'Técnica' => 'Técnica',
                    'Tecnología' => 'Tecnología',
                    'Pregrado'=> 'Pregrado',
                    'Postgrado'=> 'Postgrado',
                    'Especialización'=> 'Especialización',
                    'Maestría' => 'Maestría',
                    'Doctorado' => 'Doctorado',
                ])
                ,
            Select::make('modalidad')
                ->hint('Especifique si es virtual, presencial o ambos (ej: Virtual, Presencial, Virtual y Presencial)')
                ->label('Modalidad')
                ->required()
                ->options([
                    'Virtual' => 'Virtual',
                    'Presencial' => 'Presencial',
                    'Virtual y Presencial' => 'Virtual y Presencial',
                ])
                ,
            TextInput::make('codigo_SNIES')
                ->numeric(),
        ];
    }
}
