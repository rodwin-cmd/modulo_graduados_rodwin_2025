<?php

namespace App\Filament\Resources\EstudioPosteriorResource\Pages;

use App\Filament\Resources\EstudioPosteriorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstudioPosterior extends EditRecord
{
    protected static string $resource = EstudioPosteriorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
