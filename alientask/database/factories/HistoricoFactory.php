<?php

namespace Database\Factories;

use App\Models\Nota;
use App\Models\Tarefa;
use App\Models\User;
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
            'acao' => $this->faker->sentence(),
            'data' => $this->faker->date(),
            'tarefa_id' => Tarefa::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'nota_id' => Nota::all()->random()->id
        ];
    }
}
