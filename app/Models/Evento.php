<?php

namespace App\Models;


use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_evento' ,
        'descripcion',
        'ciudad_evento',
        'departamento_evento',
        'lugar_evento',
        'fecha_evento',
    ];
    /**
     * Relación con el graduado (un evento pertenece a un graduado)
     */
    public function graduado(): BelongsToMany
    {
        return $this->belongsToMany(Graduado::class);
    }


//    el metodo estatico getForm se utiliza reutilizar el codigo del formulario del resource
    public static function getForm():array
    {
        return [
            Section::make('Detalles del evento')
            ->collapsible()
                ->description('Describa los detalles del evento')
                ->icon('heroicon-o-information-circle')
            ->columns(2)
            ->schema([
                TextInput::make('nombre_evento')
                    ->columnSpanFull()
                    ->label('Nombre del Evento')
                    ->helperText('Escribe el nombre del Evento')
                    ->required()
                    ->maxLength(60),
                RichEditor::make('descripcion')
                    ->columnSpan(2)
                    ->helperText('Describe el Evento')
                    ->label('Descripcion del evento')
                    ->required(),
                TextInput::make('lugar_evento')
                    ->required()
                    ->maxLength(255),
                DateTimePicker::make('fecha_evento')
                    ->required(),
            ]),
            Section::make('Ciudad y Departamento')
            ->columns(2)
            ->schema([
                Select::make('departamento_evento')
                    ->label('Departamento')
                    ->options(Departamento::all()->pluck('nombre', 'nombre'))
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('ciudad_evento', null))
                    ->required(),
                Select::make('ciudad_evento')
                    ->label('Ciudad')
                    ->options(function (callable $get) {
                        $departamentoNombre = $get('departamento_evento');
                        if (!$departamentoNombre) return [];

                        $departamento = Departamento::where('nombre', $departamentoNombre)->first();
                        return $departamento
                            ? $departamento->ciudades()->pluck('nombre', 'nombre') // Clave y valor: nombre
                            : [];
                    })
                    ->required(),
            ]),

        ];
    }

}
