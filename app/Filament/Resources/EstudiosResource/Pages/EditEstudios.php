<?php

namespace App\Filament\Resources\EstudiosResource\Pages;

use App\Filament\Resources\EstudiosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstudios extends EditRecord
{
    protected static string $resource = EstudiosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
