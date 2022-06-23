<?php

namespace Database\Factories;

use App\Models\Etiqueta;
use App\Models\Marcador;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
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
            'conteudo' => $this->faker->text(),
            'trancada' => $this->faker->boolean(),
            'user_id' => User::all()->random()->id
        ];
    }
}
