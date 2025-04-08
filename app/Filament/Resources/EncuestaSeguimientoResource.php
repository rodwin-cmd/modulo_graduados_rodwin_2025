<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EncuestaSeguimientoResource\Pages;
use App\Filament\Resources\EncuestaSeguimientoResource\RelationManagers;
use App\Models\EncuestaSeguimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EncuestaSeguimientoResource extends Resource
{
    protected static ?string $model = EncuestaSeguimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('graduado_id')
                    ->relationship('graduado', 'id')
                    ->required(),
                Forms\Components\DatePicker::make('anio_aplicacion')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_respuesta')
                    ->required(),
                Forms\Components\TextInput::make('tipo_encuesta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('medio_aplicacion')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('graduado.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('anio_aplicacion')
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
            'index' => Pages\ListEncuestaSeguimientos::route('/'),
            'create' => Pages\CreateEncuestaSeguimiento::route('/create'),
            'edit' => Pages\EditEncuestaSeguimiento::route('/{record}/edit'),
        ];
    }
}
