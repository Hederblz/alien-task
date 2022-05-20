<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'datacriacao' => $this->faker->dateTime(),
            'datainicio' => $this->faker->dateTime(),
            'datafinalprevista' => $this->faker->dateTime(),
            'dataconclusao' => $this->faker->dateTime(),
            'estado' => $this->faker->word(),
        ];
    }
}
