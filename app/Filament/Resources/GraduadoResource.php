<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduadoResource\Pages;
use App\Filament\Resources\GraduadoResource\RelationManagers;
use App\Filament\Resources\GraduadoResource\Widgets\NumberAllGraduateWidget;
use App\Models\Graduado;
use Filament\Forms\Form;
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
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('avatar')
                    ->circular()
                    ->getStateUsing(function ($record) {
                        if ($record->avatar) {
                            return asset('storage/' . $record->avatar);
                        }
                        // Fallback si no hay imagen
                        return 'https://ui-avatars.com/api/?name=' . urlencode($record->nombre . ' ' . $record->apellidos) . '&background=random&color=fff';
                    }),
                Tables\Columns\TextColumn::make('nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->sortable()
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
                Tables\Columns\ToggleColumn::make('tiene_empleo'),
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
//                Tables\Actions\EditAction::make()
//                ->slideOver(),
                Tables\Actions\ViewAction::make(),
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

    // con getWidgets se define los widgets que se muestran en el panel
    // en este caso se muestra el widget que muestra el numero de graduados
    public static function getWidgets(): array
    {
        return [
            NumberAllGraduateWidget::class,
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
