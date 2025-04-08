<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramaAcademicoResource\Pages;
use App\Filament\Resources\ProgramaAcademicoResource\RelationManagers;
use App\Models\ProgramaAcademico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramaAcademicoResource extends Resource
{
    protected static ?string $model = ProgramaAcademico::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_programa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('programa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facultad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nivel')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('modalidad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo_SNIES')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_programa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('programa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facultad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nivel')
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
            'index' => Pages\ListProgramaAcademicos::route('/'),
            'create' => Pages\CreateProgramaAcademico::route('/create'),
            'edit' => Pages\EditProgramaAcademico::route('/{record}/edit'),
        ];
    }
}
