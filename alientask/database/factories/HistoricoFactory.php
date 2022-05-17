<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoricoFactory extends Factory
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
            'acao' => $this->fake->word(),
            'data' => $this->fake->dateTime(),
        ];
    }
}
