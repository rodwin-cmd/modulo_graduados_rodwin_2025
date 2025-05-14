<?php

namespace App\Filament\Widgets;

use App\Models\Graduado;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NumberGraduadosWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $total = Graduado::count(); // recupera el total de graduados
        $conEmpleo = Graduado::where('tiene_empleo', true)->count(); // recupera los que tiene true en tiene empleo

        $porcentaje = $total > 0 // validacion si total es mayor a 0
            ? round(($conEmpleo / $total) * 100, 2) // redondea el resultado a 2 decimales
            : 0;

        return [
            Stat::make('Graduados', Graduado::query()->count())
                ->description('Total de Graduados')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('% Empleo', "{$porcentaje}%")
                ->description(' Porcentaje Población empleada')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Empleo', Graduado::query()->where('tiene_empleo', true)->count())
                ->description('Total de Población empleada')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
        ];
    }

}
