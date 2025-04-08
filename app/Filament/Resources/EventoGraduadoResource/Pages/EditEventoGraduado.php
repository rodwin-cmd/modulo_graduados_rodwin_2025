<?php

namespace App\Filament\Resources\EventoGraduadoResource\Pages;

use App\Filament\Resources\EventoGraduadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventoGraduado extends EditRecord
{
    protected static string $resource = EventoGraduadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
