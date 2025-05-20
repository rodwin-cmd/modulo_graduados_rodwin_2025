<?php

namespace App\Filament\Resources\GraduadoResource\Pages;

use App\Filament\Resources\GraduadoResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;


class ListGraduados extends ListRecords
{
    protected static string $resource = GraduadoResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Graduados')
            ->icon('heroicon-o-users'),

            'tiene_empleo' => Tab::make('Con empleo')
                ->icon('heroicon-o-briefcase')
            ->modifyQueryUsing(function ($query) {
                return $query->where('tiene_empleo', true);
            }),
            'sin_empleo' => Tab::make('Sin Empleo')
                ->icon('heroicon-o-no-symbol')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('tiene_empleo', false);
                }),
            'ultima_actualizacion' => Tab::make('Sin Actualizar')
                ->icon('heroicon-o-wrench-screwdriver')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('ultima_actualizacion');
                }),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }



}
