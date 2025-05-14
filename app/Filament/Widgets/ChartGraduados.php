<?php

namespace App\Filament\Widgets;
use App\Models\Estudio;
use App\Models\Facultad;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class ChartGraduados extends ChartWidget
{
    use InteractsWithPageTable;

    protected static ?string $heading = 'Graduados por Facultad';



    protected static ?string $maxHeight ='400px';

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
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
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
