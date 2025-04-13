<?php

namespace App\Filament\Resources\GraduadoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;


class RedProfesionalesRelationManager extends RelationManager
{
    protected static string $relationship = 'redProfesionales';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_red')
                    ->required()
                    ->label('Nombre de la red'),
                Forms\Components\TextInput::make('perfil_url')
                    ->label('URL del perfil')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Redes Profesionales')
            ->columns([
                Tables\Columns\TextColumn::make('nombre_red')->label('Red Profesional'),
                Tables\Columns\TextColumn::make('perfil_url')
                    ->label('URL')
                    //url(fn($record) => $record->perfil_url) le indicca que use la columna con un enlace usando el valor de perfil_url
                    ->url(fn($record) => $record->perfil_url),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
