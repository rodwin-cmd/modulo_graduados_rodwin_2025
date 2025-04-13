<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Graduado extends Model
{
    use HasFactory;


    protected $fillable = [
        'numero_documento',
        'nombre',
        'apellidos',
        'tipo_documento',
        'sexo',
        'fecha_nacimiento',
        'correo_personal',
        'correo_institucional',
        'telefono',
        'direccion',
        'ciudad_id',
        'departamento_id',
        'programa_academico_id',

    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Relación con la ciudad (muchos graduados pertenecen a una ciudad)
     */
    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    /**
     * Relación con el departamento (muchos graduados pertenecen a un departamento)
     */
    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
    /**
     * Relación con el programa académico (muchos graduados pertenecen a un programa académico)
     */
    public function programaAcademico(): BelongsTo
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }

    /**
     * Relación con encuestas (un graduado puede tener muchas encuestas)
     */
    public function encuestas(): HasMany
    {
        return $this->hasMany(Encuesta::class);
    }

    /**
     * Relación con eventos (un graduado puede estar relacionado a muchos eventos)
     */
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
    /**
     * Relación con redes profesionales (un graduado puede tener muchas redes)
     */
    public function redProfesionales(): HasMany
    {
        return $this->hasMany(RedProfesional::class);
    }

    /**
     * Relación con la trayectoria laboral (un graduado puede tener muchas trayectorias laborales)
     */
    public function trayectoriasLaborales()
    {
        return $this->hasMany(TrayectoriaLaboral::class);
    }

    // clase estática get form se utiliza para reutilizar el form en otras instacias
    public static function getForm(): array
    {
        return [
            TextInput::make('nombre')
                ->label('Nombre del graduado')
                ->required()
                ->maxLength(255),
            TextInput::make('apellidos')
                ->required()
                ->maxLength(255),
            Select::make('tipo_documento')
                ->options([
                    'RC' => 'RC',
                    'TI' => 'TI',
                    'CC' => 'CC',
                    'TE' => 'TE',
                    'PP' => 'PP',
                    'PEP' => 'PEP',
                ])
                ->required(),
            TextInput::make('numero_documento')
                ->label('Numero de documento')
                ->numeric()
                ->unique(ignoreRecord: true)
                ->required(),
            TextInput::make('sexo')
                ->datalist([
                    'Hombre',
                    'Mujer',
                ])
                ->required(),
            DatePicker::make('fecha_nacimiento')
                ->required(),
            TextInput::make('correo_personal')
                ->required()
                ->email()
                ->maxLength(255),
            TextInput::make('correo_institucional')
                ->required()
                ->maxLength(255),
            TextInput::make('telefono')
                ->tel()
                ->required()
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            TextInput::make('direccion')
                ->required()
                ->maxLength(255),
            Select::make('departamento_id')
                ->label('Departamento residencia')
                ->relationship('departamento', 'nombre')
                ->required()
                ->reactive(),
            Select::make('ciudad_id')
                ->label('Ciudad residencia')
                ->options(function (callable $get) {
                    $departamentoId = $get('departamento_id');

                    if (!$departamentoId) return [];

                    return \App\Models\Ciudad::where('departamento_id', $departamentoId)
                        ->pluck('nombre', 'id');
                })
                ->required()
                ->searchable()
                ->preload()
                ->disabled(fn (callable $get) => !$get('departamento_id')) // Opcional: desactiva hasta que se seleccione departamento
                ->reactive(),

            Select::make('programa_academico_id')
                ->searchable()
                ->preload()
                ->relationship('programaAcademico', 'programa')
                ->createOptionForm(ProgramaAcademico::getForm())
                ->editOptionForm(ProgramaAcademico::getForm())
                ->required(),
        ];

    }

}
