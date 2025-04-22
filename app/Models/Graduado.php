<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
        'avatar'

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
     * Relación con el programa Estudios (un graduado puede tener muchos estudios)
     */
    public function estudios(): HasMany
    {
        return $this->hasMany(Estudio::class);
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
    public function trayectoriasLaborales():HasMany
    {
        return $this->hasMany(TrayectoriaLaboral::class);
    }
    /**
     * Relación con reconocimientos (un graduado puede tener muchos reconocimientos)
     */
    public function reconocimientos():HasMany
    {
        return $this->hasMany(Reconocimiento::class);
    }

    // clase estática get form se utiliza para reutilizar el form en otras instacias
    //Tabs es un componente de filament que organiza la información en listas visuales
    public static function getForm(): array
    {
        return [
            Tabs::make('Formulario de Graduado')
                ->columnSpanFull()
                ->tabs([
                    Tabs\Tab::make('Datos Personales')
                        ->icon('heroicon-o-user')
                        ->columns(3)
                        ->schema([
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
                                ->label('Número de documento')
                                ->numeric()
                                ->unique(ignoreRecord: true)
                                ->required(),
                            Select::make('sexo')
                                ->options([
                                    'Hombre' => 'Hombre',
                                    'Mujer' => 'Mujer',
                                    'Otro' => 'Otro',
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
                                ->disabled(fn (callable $get) => !$get('departamento_id'))
                                ->reactive(),
                        ]),

//                    Estudios académicos

                        Tabs\Tab::make('Estudios Académicos')
                            ->icon('heroicon-o-academic-cap')
                            ->columns(2)
                            ->schema([
                                Repeater::make('estudios')
                                    ->columnSpanFull()
                                    ->label('Estudios académicos')
                                    ->relationship()
                                    ->schema([
                                        Select::make('nivel_estudios')
                                            ->options([
                                                'Curso' => 'Curso',
                                                'Diplomado' => 'Diplomado',
                                                'Técnico' => 'Técnico',
                                                'Tecnología' => 'Tecnología',
                                                'Pregrado' => 'Pregrado',
                                                'Especialización' => 'Especialización',
                                                'Maestría' => 'Maestría',
                                                'Doctorado' => 'Doctorado',
                                            ])
                                            ->required()
                                            ->label('Nivel de estudio'),

                                        TextInput::make('programa')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Nombre del programa'),

                                        TextInput::make('institucion')
                                            ->maxLength(255)
                                            ->label('Universidad o centro formativo'),

                                        DatePicker::make('fecha_inicio')->label('Fecha de inicio'),
                                        DatePicker::make('fecha_fin')->label('Fecha de finalización'),
                                    ])
                                    ->columns(2), // ajustar las columnas si es necesario
                            ]),

                        // Experiencia Laboral
                        Tabs\Tab::make('Experiencia Laboral')
                            ->icon('heroicon-o-building-office-2')
                            ->columns(2)
                            ->schema([
                                Repeater::make('trayectoriasLaborales')
                                    ->columnSpanFull()
                                ->relationship('trayectoriasLaborales')
                                ->label('Experiencias Laborales')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('empresa')->required(),
                                        TextInput::make('direccion')->required(),
                                        TextInput::make('cargo')->required(),
                                        TextInput::make('sector_productivo'),
                                        TextInput::make('ciudad')->required(),
                                        TextInput::make('pais')->required(),
                                        TextInput::make('area_desempeno')->required(),
                                        DatePicker::make('fecha_inicio')->required(),
                                        DatePicker::make('fecha_fin')->required(),
                                        Toggle::make('relacion_formacion')
                                            ->label('Experiencia relacionada con perfil')
                                            ->required(),
                                    ]),
                            ]),

                        //RED PROFESIONALES
                        Tabs\Tab::make('Red profesional')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Repeater::make('redprofesionales')
                                    ->columns(3)
                                ->relationship('redprofesionales')
                                ->label('Redes profesionales')
                                    ->columns(3)
                                    ->schema([
                                        Select::make('nombre_red')
                                            ->options([
                                                'LinkedIn' => 'LinkedIn',
                                                'Facebook' => 'Facebook',
                                                'Instagram' => 'Instagram',
                                                'You Tube' => 'You Tube',
                                                'X' => 'X',
                                                'Git Hub' => 'Git Hub',
                                                'Threads' => 'Threads',
                                            ])
                                            ->required()
                                            ->label('Redes Sociales / Profesionales'),
                                        TextInput::make('perfil_url')->required()
                                            ->url()
                                            ->suffixIcon('heroicon-m-globe-alt')
                                            ->suffixIconColor('success'),
//                                        TextInput::make('portafolio')->nullable()
//                                        ->label('Sube tu portafolio en formato PDF'),
//                                        TextInput::make('curriculum')->nullable()
//                                        ->label('Sube tu curriculum en formato PDF'),
                                    ])
                        ]),

                         //RECONOCIMIENTOS
                         Tabs\Tab::make('Reconocimientos')
                            ->icon('heroicon-o-trophy')
                            ->columns(2)
                            ->schema([
                                Repeater::make('reconocimientos')
                                    ->relationship() // usa la relación hasMany automáticamente
                                    ->label('Reconocimientos')
                                    ->schema([
                                        Select::make('tipo')
                                            ->label('Tipo de reconocimiento')
                                            ->options([
                                                'Académico' => 'Académico',
                                                'Empresarial' => 'Empresarial',
                                            ])
                                            ->required(),
                                        TextInput::make('titulo')->required(),

                                        Textarea::make('descripcion')->rows(3),

                                        TextInput::make('entidad_otorgante')->required(),

                                        DatePicker::make('fecha')->required(),

                                    ])
                                    ->columns(2)
                                    ->label('Agregar reconocimiento')
                        ]),
            ]),
        ];

    }

}
