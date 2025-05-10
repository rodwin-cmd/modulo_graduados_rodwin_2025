<?php

namespace App\Filament\Resources\GraduadoResource\Pages;

use App\Filament\Resources\GraduadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListGraduados extends ListRecords
{
    protected static string $resource = GraduadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }



}
