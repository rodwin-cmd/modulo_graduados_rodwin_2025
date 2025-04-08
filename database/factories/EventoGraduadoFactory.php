<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EventoContacto;
use App\Models\EventoContactoGraduado;
use App\Models\EventoGraduado;
use App\Models\Graduado;

class EventoGraduadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventoGraduado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'evento_contacto_id' => EventoContacto::factory(),
            'graduado_id' => Graduado::factory(),
            'evento_contacto_graduado_id' => EventoContactoGraduado::factory(),
        ];
    }
}
