<?php

namespace App\Filament\Widgets;

use App\Models\Graduado;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class GradudosPerfil extends ChartWidget
{
    use InteractsWithPageTable;

    protected static ?string $heading = 'Graduados con empleo relacionado con su formación académica.';

    protected static ?string $maxHeight ='300px';

    protected function getData(): array
    {
        $conRelacion = Graduado::whereHas('trayectoriasLaborales', function ($query) {
            $query->where('relacion_formacion', true);
        })->count();

        $sinRelacion = Graduado::whereDoesntHave('trayectoriasLaborales', function ($query) {
            $query->where('relacion_formacion', true);
        })->count();

        return [
            'datasets' => [
                [
                    'data' => [$conRelacion, $sinRelacion],
                    'backgroundColor' => ['#10B981', '#EF4444'],
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Con relación', 'Sin relación'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // o 'pie'
    }
}
