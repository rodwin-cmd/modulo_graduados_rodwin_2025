<?php

namespace App\Filament\Resources\GraduadoResource\Pages;

use App\Filament\Resources\GraduadoResource;
use App\Filament\Resources\GraduadoResource\Widgets\NumberAllGraduateWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGraduados extends ListRecords
{
    protected static string $resource = GraduadoResource::class;

    // mostrar el widget en la pagina , en la cabecera

    protected function getHeaderWidgets(): array
    {
        return [
            NumberAllGraduateWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
