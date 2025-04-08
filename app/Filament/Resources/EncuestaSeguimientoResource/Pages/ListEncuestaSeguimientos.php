<?php

namespace App\Filament\Resources\EncuestaSeguimientoResource\Pages;

use App\Filament\Resources\EncuestaSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEncuestaSeguimientos extends ListRecords
{
    protected static string $resource = EncuestaSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
