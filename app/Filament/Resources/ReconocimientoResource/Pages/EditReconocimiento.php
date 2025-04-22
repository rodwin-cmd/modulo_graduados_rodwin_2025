<?php

namespace App\Filament\Resources\ReconocimientoResource\Pages;

use App\Filament\Resources\ReconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReconocimiento extends EditRecord
{
    protected static string $resource = ReconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
