<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduadoResource\Pages;
use App\Filament\Resources\GraduadoResource\RelationManagers;
use App\Models\Graduado;
use App\Models\Estudio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class GraduadoResource extends Resource
{
    protected static ?string $model = Graduado::class;

//    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                Tables\Columns\TextColumn::make('numero_documento')
                    ->formatStateUsing(fn ($state) => (string) $state)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_personal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_institucional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
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
                Tables\Filters\SelectFilter::make('programa')
                    ->relationship('estudios', 'programa')
                    ->multiple()
                    ->searchable()
                    ->preload()

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->slideOver(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // crear vistas personalizadas tipo info list
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informacion Personal')
                ->columns(3)
                ->schema([
                   TextEntry::make('nombre'),
                    TextEntry::make('apellidos'),
                    TextEntry::make('tipo_documento'),
                    TextEntry::make('numero_documento'),
                    TextEntry::make('correo_personal'),
                    TextEntry::make('correo_institucional'),
                    TextEntry::make('telefono'),
                    TextEntry::make('direccion'),
                    TextEntry::make('ciudad.nombre'),

                ])
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
//            'edit' => Pages\EditGraduado::route('/{record}/edit'),
            'view' => Pages\ViewGraduado::route('/{record}'),
        ];
    }
}
