<?php

namespace App\Filament\Widgets;

use App\Models\TrayectoriaLaboral;
use Filament\Widgets\ChartWidget;

class TipoContratoChart extends ChartWidget
{
    protected static ?string $heading = 'Distribución por Tipo de Contrato';

    protected function getData(): array
    {

        {
            $data = TrayectoriaLaboral::whereNotNull('tipo_contrato')
                ->where('tipo_contrato', '!=', '')
                ->selectRaw('tipo_contrato, COUNT(*) as total')
                ->groupBy('tipo_contrato')
                ->pluck('total', 'tipo_contrato');

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
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
