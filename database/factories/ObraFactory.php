<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObraFactory extends Factory
{
    public function definition(): array
    {
        $inicio = $this->faker->dateTimeBetween('-2 months', '+1 month');
        $fim    = (clone $inicio)->modify('+' . $this->faker->numberBetween(15, 120) . ' days');

        return [
            'codigo'          => 'OBR-' . $this->faker->unique()->numerify('#####'),
            'titulo'          => $this->faker->sentence(3),
            'status'          => $this->faker->randomElement(['planejada','em_andamento','pausada','concluida','cancelada']),
            'inicio_previsto' => $inicio->format('Y-m-d'),
            'fim_previsto'    => $fim->format('Y-m-d'),
            'orcamento'       => $this->faker->randomFloat(2, 5000, 300000),
            'descricao'       => $this->faker->paragraph(),
        ];
    }
}
