<?php

namespace App\Filament\Resources\ReconocimientoResource\Pages;

use App\Filament\Resources\ReconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReconocimientos extends ListRecords
{
    protected static string $resource = ReconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
