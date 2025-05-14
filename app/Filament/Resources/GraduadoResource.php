<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduadoResource\Pages;
use App\Filament\Resources\GraduadoResource\RelationManagers\EncuestaRelationManager;
use App\Filament\Resources\GraduadoResource\Widgets\GraduadosPorFacultadChart;
use App\Models\Facultad;
use App\Models\Graduado;
use App\Models\ProgramaAcademico;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;


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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_documento')
                    ->label('Número de documento')
                    ->formatStateUsing(fn ($state) => (string) $state)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_personal')
                    ->label('Correo Personal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo_institucional')
                    ->label('Correo Institucional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('tiene_empleo')
                    ->label('¿Tiene empleo?'),

                Tables\Columns\ToggleColumn::make('ultima_actualizacion')
                    ->label('¿Información Actualizada?')
                ,

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            //filters se define los filtros que se muestran en la tabla
            ->filters([
                Tables\Filters\Filter::make('Facultad y Programa')
                    ->form([
                        Select::make('facultad_id')
                            ->label('Facultad')
                            ->options(Facultad::pluck('nombre', 'id')->toArray())
                            ->reactive(), // para actualizar dinámicamente

                        Select::make('programa_id')
                            ->label('Programa Académico')
                            ->options(function (callable $get) {
                                $facultadId = $get('facultad_id');
                                if (!$facultadId) return [];

                                return ProgramaAcademico::where('facultad_id', $facultadId)
                                    ->pluck('nombre', 'id');
                            }),
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['programa_id']) {
                            $query->where('programa_id', $data['programa_id']);
                        }
                        if ($data['facultad_id']) {
                            // Usamos la relación para filtrar por facultad
                            $query->whereHas('facultad', function ($q) use ($data) {
                                $q->where('id', $data['facultad_id']);
                            });
                        }
                    }),

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

        ];
    }

    // con getWidgets se define los widgets que se muestran en el panel
    // en este caso se muestra el widget que muestra el numero de graduados
    public static function getWidgets(): array
    {
        return [

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
