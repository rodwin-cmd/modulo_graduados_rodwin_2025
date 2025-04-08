<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoResource\Pages;
use App\Filament\Resources\EventoResource\RelationManagers;
use App\Models\Evento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Departamento;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nombre_evento')
                    ->label('Nombre del Evento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->required(),
                Forms\Components\Select::make('departamento_evento')
                    ->label('Departamento')
                    ->options(Departamento::all()->pluck('nombre', 'nombre'))
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('ciudad_evento', null))
                    ->required(),
                Forms\Components\Select::make('ciudad_evento')
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

                Forms\Components\TextInput::make('lugar_evento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_evento')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nombre_evento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('ciudad_evento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lugar_evento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_evento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}
