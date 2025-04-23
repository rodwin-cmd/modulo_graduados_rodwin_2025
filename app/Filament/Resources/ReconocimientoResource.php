<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReconocimientoResource\Pages;
use App\Filament\Resources\ReconocimientoResource\RelationManagers;
use App\Models\Reconocimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReconocimientoResource extends Resource
{
    protected static ?string $model = Reconocimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
    //oculta el resource de la vista prinicpal
    public static function shouldRegisterNavigation(): bool
    {
        return false;
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
            'index' => Pages\ListReconocimientos::route('/'),
            'create' => Pages\CreateReconocimiento::route('/create'),
            'edit' => Pages\EditReconocimiento::route('/{record}/edit'),
        ];
    }
}
