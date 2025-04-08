<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoGraduadoResource\Pages;
use App\Filament\Resources\EventoGraduadoResource\RelationManagers;
use App\Models\EventoGraduado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventoGraduadoResource extends Resource
{
    protected static ?string $model = EventoGraduado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_evento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion_evento')
                    ->required()
                    ->label('Descripción del evento'),
                Forms\Components\Textarea::make('lugar del evento')
                    ->required()
                    ->label('Lugar del Evento'),
                Forms\Components\DatePicker::make('fecha_evento')

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEventoGraduados::route('/'),
            'create' => Pages\CreateEventoGraduado::route('/create'),
            'edit' => Pages\EditEventoGraduado::route('/{record}/edit'),
        ];
    }
}
