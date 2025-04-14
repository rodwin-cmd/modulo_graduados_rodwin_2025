<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EncuestaResource\Pages;
use App\Filament\Resources\EncuestaResource\RelationManagers;
use App\Models\Encuesta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EncuestaResource extends Resource
{
    protected static ?string $model = Encuesta::class;

//    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Panel Administrativo';

    public static function getNavigationBadge(): ?string
    {
       return Encuesta::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_aplicacion')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_respuesta')
                    ->required(),
                Forms\Components\TextInput::make('tipo_encuesta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('medio_aplicacion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Hidden::make('graduado_id')
                    ->hidden(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_aplicacion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_respuesta')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_encuesta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medio_aplicacion')
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
            'index' => Pages\ListEncuestas::route('/'),
            'create' => Pages\CreateEncuesta::route('/create'),
            'edit' => Pages\EditEncuesta::route('/{record}/edit'),
        ];
    }
}
