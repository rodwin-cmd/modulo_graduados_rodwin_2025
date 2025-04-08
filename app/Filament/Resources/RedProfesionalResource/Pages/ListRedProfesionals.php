<?php

namespace App\Filament\Resources\RedProfesionalResource\Pages;

use App\Filament\Resources\RedProfesionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRedProfesionals extends ListRecords
{
    protected static string $resource = RedProfesionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
