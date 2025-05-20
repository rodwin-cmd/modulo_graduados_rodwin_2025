<?php

namespace App\Filament\Widgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use App\Models\Graduado;

class GraduadosConEventoChart extends ChartWidget
{
    protected static ?string $heading = 'Asistencia a eventos de graduados';

    protected function getData(): array
    {
        $graduadosConEvento = Graduado::whereHas('eventos')->count();
        $graduadosSinEvento = Graduado::doesntHave('eventos')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Graduados',
                    'data' => [
                        $graduadosConEvento,
                        $graduadosSinEvento,
                    ],
                    'backgroundColor' => [
                        '#4e73df', // color segmento Hombre
                        '#1cc88a', // color segmento Mujer
                    ],
                ],
            ],
            'labels' => ['Con evento', 'Sin evento'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
