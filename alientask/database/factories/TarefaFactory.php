<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'descricao' => $this->faker->sentence(),
            'data_criacao' => $this->faker->date(),
            'data_conclusao' => $this->faker->date(),
            'estado' => $this->faker->word(),
            'user_id' => User::all()->random()->id

        ];
    }
}
