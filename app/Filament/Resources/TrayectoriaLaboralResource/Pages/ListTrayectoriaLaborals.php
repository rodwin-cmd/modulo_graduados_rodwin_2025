<?php

namespace App\Filament\Resources\TrayectoriaLaboralResource\Pages;

use App\Filament\Resources\TrayectoriaLaboralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrayectoriaLaborals extends ListRecords
{
    protected static string $resource = TrayectoriaLaboralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
