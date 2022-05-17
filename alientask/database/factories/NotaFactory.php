<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
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
            'titulo' => $this->fake->word(),
            'conteudo' => $this->fake->paragraphs(),
        ];
    }
}
