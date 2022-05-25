<?php

namespace Database\Factories;

use App\Models\Nota;
use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Historico>
 */
class HistoricoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->sentence(),
            'acao' => $this->faker->sentence(),
            'data' => $this->faker->dateTime(),
            'user_id' => Tarefa::all()->random()->id
        ];
    }
}
