<?php

namespace App\Filament\Resources\EncuestaSeguimientoResource\Pages;

use App\Filament\Resources\EncuestaSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEncuestaSeguimiento extends EditRecord
{
    protected static string $resource = EncuestaSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
