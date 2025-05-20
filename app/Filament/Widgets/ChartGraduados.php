<?php

namespace App\Filament\Widgets;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class ChartGraduados extends ChartWidget
{
    use InteractsWithPageTable;

    protected static ?string $heading = 'Graduados por Facultad';

    protected static ?string $maxHeight ='600px';

    protected function getData(): array
    {
        // Agrupar estudios por facultad y contar los graduados únicos por facultad
        $estudiosPorFacultad = \App\Models\Estudio::with('programa.facultad', 'graduado')
            ->get()
            ->groupBy(fn($estudio) => $estudio->programa->facultad->nombre ?? 'Sin facultad')
            ->map(fn($grupo) => $grupo->pluck('graduado_id')->unique()->count());

        $labels = $estudiosPorFacultad->keys()->toArray();
        $data = $estudiosPorFacultad->values()->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Graduados',
                    'data' => $data,
                    'backgroundColor' => [
                        '#4e73df', // color segmento
                        '#1cc88a', // color segmento
                        '#36b9cc', // color segmento
                        '#FFD700',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
