<?php

namespace App\Filament\Resources\EstudiosResource\Pages;

use App\Filament\Resources\EstudiosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstudios extends ListRecords
{
    protected static string $resource = EstudiosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
