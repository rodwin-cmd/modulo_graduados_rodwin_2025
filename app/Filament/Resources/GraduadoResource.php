<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduadoResource\Pages;
use App\Filament\Resources\GraduadoResource\RelationManagers;
use App\Models\Graduado;
use App\Models\Estudio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class GraduadoResource extends Resource
{
    protected static ?string $model = Graduado::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    // Navigationgroup define el orden que aparece el recurso en el panel
    protected static ?string $navigationGroup = 'Panel Graduados';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Graduado::getForm());
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
                Tables\Columns\TextColumn::make('niveles_estudio')
                    ->label('Niveles de estudio')
                    ->formatStateUsing(function ($record) {
                        return $record->estudios
                            ? $record->estudios->pluck('nivel')->unique()->join(', ')
                            : '—';
                    })
                    ->toggleable()
                    ->wrap(),
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
                Tables\Actions\ViewAction::make(),
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


//    Get pages se define las rutas del Resource
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGraduados::route('/'),
            'create' => Pages\CreateGraduado::route('/create'),
            'edit' => Pages\EditGraduado::route('/{record}/edit'),
            'view' => Pages\ViewGraduado::route('/{record}'),
        ];
    }
}
