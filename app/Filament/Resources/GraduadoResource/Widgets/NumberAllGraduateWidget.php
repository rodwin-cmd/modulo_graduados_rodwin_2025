<?php

namespace App\Filament\Resources\GraduadoResource\Widgets;

use App\Models\Graduado;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NumberAllGraduateWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }


    protected function getStats(): array
    {
        return [
            Stat::make('Total de Graduados', Graduado::count())
                ->description('Número de Graduados Registrados')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Total Graduados con Empleo', Graduado::where('tiene_empleo', true)->count())
                ->description('Graduados actualmente empleados')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('primary')
        ];
    }
}
