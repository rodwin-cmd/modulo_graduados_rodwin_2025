<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'ultima_actualizacion',
        'avatar',
        'facultad_id',
    ];

    /******************************** Relaciones BD****************************************/

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
     * Mostrar solo un estudio, el mas reciente en la tabla principal
     */
    public function ultimoEstudio()
    {
        return $this->hasOne(Estudio::class)->latestOfMany();
    }

    /**
     * Si un graduado puede tener muchas encuestas y una encuesta puede pertenecer a muchos graduados
     */
    public function encuestas(): BelongsToMany
    {
        return $this->belongsToMany(Encuesta::class);
    }

    /**
     * Relación con eventos (un graduado puede estar relacionado a muchos eventos)
     */
    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class);
    }
    /**
     * Relación con redes profesionales (un graduado puede tener muchas redes)
     */
    public function redprofesionales(): HasMany
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


    public function facultad():BelongsTo
    {
        return $this->belongsTo(Facultad::class); // Relación con Facultad
    }

    public function programa(): BelongsTo
    {
        return $this->belongsTo(ProgramaAcademico::class, 'programa_academico_id');
    }

    /******************************** METODOS Y CLASES  FILAMENT****************************************/



    // clase estática get form se utiliza para reutilizar el form en otras instacias.
    //Tabs es un componente de filament que organiza la información en pestañas visuales
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
                                ->label('Nombre')
                                ->required()
                                ->maxLength(100),
                            TextInput::make('apellidos')
                                ->required()
                                ->maxLength(100),
                            Select::make('tipo_documento')
                                ->label('Tipo de documento')
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
                                ->label('Fecha de Nacimiento')
                                ->helperText('Mes/Día/Año')
                                ->required(),
                            TextInput::make('correo_personal')
                                ->label('Correo Personal')
                                ->required()
                                ->email()
                                ->maxLength(100),
                            TextInput::make('correo_institucional')
                                ->label('Correo Institucional')
                                ->required()
                                ->maxLength(100),
                            TextInput::make('telefono')
                                ->label('Teléfono')
                                ->tel()
                                ->required()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                            TextInput::make('direccion')
                                ->label('Dirección')
                                ->required()
                                ->maxLength(255),
                            Select::make('departamento_id')
                                ->label('Departamento Residencia')
                                ->relationship('departamento',
                                    'nombre')
                                ->required()
                                ->reactive(),
                            Select::make('ciudad_id')
                                ->label('Ciudad Residencia')
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
                                    ->label('Estudios Académicos')
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
                                            ->label('Nivel de Estudios'),

                                        Select::make('facultad_id')
                                            ->label('Facultad')
                                            ->options(\App\Models\Facultad::pluck('nombre', 'id'))
                                            ->reactive()
                                            ->required()
                                            ->afterStateUpdated(fn (callable $set) => $set('programa_id', null)),

                                        Select::make('programa_id')
                                            ->label('Programa académico')
                                            ->options(fn (callable $get) =>
                                            \App\Models\ProgramaAcademico::where('facultad_id', $get('facultad_id'))->pluck('programa', 'id')
                                            )
                                            ->required()
                                            ->searchable()
                                            ->placeholder('Seleccione un programa')
                                            ->visible(fn (callable $get) => $get('facultad_id')),
                                        TextInput::make('institucion')
                                            ->label('Institución')
                                            ->required()
                                            ->maxLength(100),
                                        DatePicker::make('fecha_inicio')->label('Fecha Inicio'),
                                        DatePicker::make('fecha_fin')->label('Fecha Fin')
                                        ->after('fecha_inicio'),

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

                                        Select::make('sector_productivo')
                                            ->label('Actividad económica')
                                            ->helperText('Seleccione el sector productivo')
                                            ->options([
                                                'Agricultura y Ganadería' =>'Agricultura y Ganadería',
                                                'Minería y Energía'=> 'Minería y Energía',
                                                'Industria y Manufactura' => 'Industria y Manufactura',
                                                'Construcción' => 'Construcción',
                                                'Comercio y Servicios' => 'Comercio y Servicios',
                                                'Turismo y Hospitalidad' => 'Turismo y Hospitalidad',
                                                'Educación y Cultura' => 'Educación y Cultura',
                                                'Salud y Bienestar' => 'Salud y Bienestar',
                                                'Finanzas y Seguros' => 'Finanzas y Seguros',
                                                'Tecnología y Comunicación' => 'Tecnología y Comunicación',
                                                'Investigación y Desarrollo' => 'Investigación y Desarrollo',
                                                'Servicios Sociales y ONGs' => 'Servicios Sociales y ONGs',
                                                'otro' => 'Otro',
                                            ])
                                        ->required(),

                                        Select::make('area_desempeno')
                                            ->label('Área')
                                            ->helperText('Seleccione el área de la organización')
                                            ->options([
                                                'Atención al cliente' => 'Atención al cliente',
                                                'Comercial' => 'Comercial',
                                                'Compras' => 'Compras',
                                                'Dirección' => 'Direccion',
                                                'Finanzas y Contabilidad' => 'Finanzas y Contabilidad',
                                                'Legal y seguros' => 'Legal y seguros',
                                                'Logística y Operaciones' => 'Logística y Operaciones',
                                                'Marketing' => 'Marketing',
                                                'Producción' => 'Producción',
                                                'Recursos Humanos' => 'Recursos Humanos',
                                                'Sistemas de Gestión' => 'Sistemas de Gestión',
                                                'Tecnología y Sistemas de Información' => 'Tecnología y Sistemas de Información',
                                                'Ventas' => 'Ventas',
                                            ])
                                            ->required(),


                                        Select::make('departamento_id')
                                            ->label('Departamento ')
                                            ->relationship('departamento', 'nombre')
                                            ->reactive()
                                            ->afterStateUpdated(fn (callable $set) => $set('ciudad_id', null)),
                                        Select::make('ciudad_id')
                                            ->label('Ciudad')
                                            ->options(fn (callable $get) =>
                                            \App\Models\Ciudad::where('departamento_id', $get('departamento_id'))
                                                ->pluck('nombre', 'id')
                                            )
                                            ->required()
                                            ->disabled(fn (callable $get) => !$get('departamento_id'))
                                            ->reactive(),

                                        DatePicker::make('fecha_inicio')
                                            ->required(),
                                        Toggle::make('relacion_formacion')
                                            ->label('Experiencia Relacionada con Perfil')
                                            ->required(),

                                        Toggle::make('trabaja_actualmente')
                                            ->label('Actualmente trabajando')
                                            ->reactive()
                                            ->afterStateUpdated(function (callable $set, $state) {
                                                if ($state) {
                                                    $set('fecha_fin', null);
                                                }
                                            }),
                                        DatePicker::make('fecha_fin')
                                            ->required()
                                            ->disabled(fn (callable $get) => $get('trabaja_actualmente'))
                                            ->required(fn (callable $get) => !$get('trabaja_actualmente'))
                                            ->reactive(),
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
                                            ->label('Tipo de Reconocimiento')
                                            ->options([
                                                'Académico' => 'Académico',
                                                'Empresarial' => 'Empresarial',
                                            ])
                                            ,
                                        TextInput::make('titulo'),

                                        Textarea::make('descripcion')->rows(3),

                                        TextInput::make('entidad_otorgante')
                                            ->label('Entidad Otorgante')
                                            ,

                                        DatePicker::make('fecha')
                                            ->label('Fecha de Otorgamiento')
                                            ,

                                    ])
                                    ->columns(2)
                                    ->label('Agregar reconocimiento')
                        ]),
                             //RECONOCIMIENTOS
                    Tabs\Tab::make('Eventos')
                        ->icon('heroicon-o-calendar')
                        ->schema([
                            Select::make('eventos')
                                ->label('Eventos asistidos')
                                ->multiple()
                                ->relationship('eventos', 'nombre_evento')
                                ->searchable()
                                ->preload(),
                        ]),
                    //ENCUESTAS
                    Tabs\Tab::make('Encuestas')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->schema([
                            Select::make('encuestas')
                                ->label('Encuestas realizadas')
                                ->multiple()
                                ->relationship('encuestas', 'nombre')
                                ->searchable()
                                ->preload(),
                        ]),
            ]),
        ];

    }

}
