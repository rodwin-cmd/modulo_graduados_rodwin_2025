<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramaAcademicoResource\Pages;
use App\Filament\Resources\ProgramaAcademicoResource\RelationManagers;
use App\Models\ProgramaAcademico;
use App\Models\Facultad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class ProgramaAcademicoResource extends Resource
{
    protected static ?string $model = ProgramaAcademico::class;
    // clase $navigationIcon, muestra el icono en el panel de navegacion
    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    //Clase $navigationGroup, muestra el grupo en el panel de navegacion
    protected static ?string $navigationGroup = 'Panel Administrativo';
    public static function form(Form $form): Form
    {
        return $form
            ->schema(ProgramaAcademico::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('programa')
                    ->label('Nombre Programa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('facultad.nombre')
                    ->label('Nombre de la Facultad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nivel')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('modalidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_SNIES')
                    ->numeric()
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
                // FILTRO DINAMICOS EN TABLE PROGRAMAS ACADEMICOS
                tables\Filters\SelectFilter::make('facultad')
                    ->relationship('facultad', 'nombre'),
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

    //oculta o muestra  el resource de la vista prinicpal
    public static function shouldRegisterNavigation(): bool
    {
        return true;
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
            'index' => Pages\ListProgramaAcademicos::route('/'),
            'create' => Pages\CreateProgramaAcademico::route('/create'),
            'edit' => Pages\EditProgramaAcademico::route('/{record}/edit'),
        ];
    }
}
