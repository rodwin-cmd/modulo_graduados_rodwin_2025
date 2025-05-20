<?php

namespace App\Filament\Widgets;

use App\Models\TrayectoriaLaboral;
use Filament\Widgets\ChartWidget;

class SectorChart extends ChartWidget
{
    protected static ?string $heading = 'Distribución por Sector (Público/Privado/Mixto)';

    protected function getData(): array
    {
        $data = TrayectoriaLaboral::whereNotNull('sector')
            ->where('sector', '!=', '')
            ->selectRaw('sector, COUNT(*) as total')
            ->groupBy('sector')
            ->pluck('total', 'sector');
        return [
            'datasets' => [
                [
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
