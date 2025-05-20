<?php

namespace App\Filament\Widgets;

use App\Models\TrayectoriaLaboral;
use Filament\Widgets\ChartWidget;

class NivelSalarialChart extends ChartWidget
{
    protected static ?string $heading = 'Distribución por Nivel Salarial';

    protected function getData(): array
    {
        $data = TrayectoriaLaboral::whereNotNull('nivel_salarial')
            ->where('nivel_salarial', '!=', '')
            ->selectRaw('nivel_salarial, COUNT(*) as total')
            ->groupBy('nivel_salarial')
            ->pluck('total', 'nivel_salarial');
        return [
            'datasets' => [
                [
                    'label' => 'Cantidad',
                    'data' => $data->values(),
                    'backgroundColor' => [
                        '#4e73df', // color segmento
                        '#1cc88a', // color segmento
                        '#36b9cc', // color segmento
                        '#FFD700',
                    ],
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
