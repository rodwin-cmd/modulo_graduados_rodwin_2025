<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudioPosteriorResource\Pages;
use App\Filament\Resources\EstudioPosteriorResource\RelationManagers;
use App\Models\EstudioPosterior;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstudioPosteriorResource extends Resource
{
    protected static ?string $model = EstudioPosterior::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('graduado_id')
                    ->relationship('graduado', 'id')
                    ->required(),
                Forms\Components\TextInput::make('nivel_estudios')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('programa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('institucion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pais')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ciudad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('graduado.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nivel_estudios')
                    ->searchable(),
                Tables\Columns\TextColumn::make('programa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institucion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pais')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->date()
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
            'index' => Pages\ListEstudioPosteriors::route('/'),
            'create' => Pages\CreateEstudioPosterior::route('/create'),
            'edit' => Pages\EditEstudioPosterior::route('/{record}/edit'),
        ];
    }
}
