<?php

namespace App\Filament\Resources\GraduadoResource\Pages;

use App\Filament\Resources\GraduadoResource;
use App\Models\Graduado;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGraduado extends ViewRecord
{
    protected static string $resource = GraduadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->slideOver()
                ->form(Graduado::getForm()),
        ];
    }





}
