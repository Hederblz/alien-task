<?php

namespace Database\Factories;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marcador>
 */
class MarcadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'cor' => $this->faker->hexColor(),
            'tarefa_id' => Tarefa::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
