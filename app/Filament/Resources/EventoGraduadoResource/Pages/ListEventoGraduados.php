<?php

namespace App\Filament\Resources\EventoGraduadoResource\Pages;

use App\Filament\Resources\EventoGraduadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventoGraduados extends ListRecords
{
    protected static string $resource = EventoGraduadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
