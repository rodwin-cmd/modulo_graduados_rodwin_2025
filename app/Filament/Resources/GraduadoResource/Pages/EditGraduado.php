<?php

namespace App\Filament\Resources\GraduadoResource\Pages;

use App\Filament\Resources\GraduadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGraduado extends EditRecord
{
    protected static string $resource = GraduadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
