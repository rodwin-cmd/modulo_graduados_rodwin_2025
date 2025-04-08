<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedProfesionalResource\Pages;
use App\Filament\Resources\RedProfesionalResource\RelationManagers;
use App\Models\RedProfesional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedProfesionalResource extends Resource
{
    protected static ?string $model = RedProfesional::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('red_social')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url_red_social')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('portafolio')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('curriculum_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('graduado_id')
                    ->relationship('graduado', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('red_social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_red_social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('portafolio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('curriculum_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('graduado.id')
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
            'index' => Pages\ListRedProfesionals::route('/'),
            'create' => Pages\CreateRedProfesional::route('/create'),
            'edit' => Pages\EditRedProfesional::route('/{record}/edit'),
        ];
    }
}
