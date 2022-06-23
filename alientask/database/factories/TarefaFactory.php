<?php

namespace Database\Factories;

use App\Models\Etiqueta;
use App\Models\Marcador;
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
            'data_conclusao' => $this->faker->date(),
            'concluida' => $this->faker->boolean(),
            'trancada' => $this->faker->boolean(),
            'user_id' => User::all()->random()->id
        ];
    }
}
