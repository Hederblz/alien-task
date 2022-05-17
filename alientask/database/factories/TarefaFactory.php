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
            'id' => $this->fake->randomNumber(),
            'titulo' => $this->faker->word(),
            'descricao' => $this->fake->sentence(),
            'datacriacao' => $this->fake->dateTime(),
            'datainicio' => $this->fake->dateTime(),
            'datafinalprevista' => $this->fake->dateTime(),
            'dataconclusao' => $this->fake->dateTime(),
            'estado' => $this->fake->word(),
        ];
    }
}
