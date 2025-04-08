<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduadoResource\Pages;
use App\Filament\Resources\GraduadoResource\RelationManagers;
use App\Models\Graduado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Pest\Laravel\options;

class GraduadoResource extends Resource
{
    protected static ?string $model = Graduado::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellidos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipo_documento')
                        ->options([
                            'RC' => 'RC',
                            'TI' => 'TI',
                            'CC' => 'CC',
                            'TE' => 'TE',
                            'PP' => 'PP',
                            'PEP' => 'PEP',
                        ])
                    ->required(),
                Forms\Components\TextInput::make('numero_documento')
                    ->label('Numero de documento')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('sexo')
                    ->datalist([
                        'Hombre',
                        'Mujer',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->required(),
                Forms\Components\TextInput::make('correo_personal')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('correo_institucional')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->required()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('ciudad_id')
                    ->relationship('ciudad', 'nombre'),
                Forms\Components\Select::make('programa_academico_id')
                    ->relationship('programaAcademico', 'programa')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_documento')
                    ->formatStateUsing(fn ($state) => (string) $state)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('correo_personal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_institucional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad.nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('programaAcademico.programa')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListGraduados::route('/'),
            'create' => Pages\CreateGraduado::route('/create'),
            'edit' => Pages\EditGraduado::route('/{record}/edit'),
        ];
    }
}
