<?php

namespace Database\Seeders;

use App\Models\Historico;
use App\Models\Tarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 5; $i++) {
            Historico::factory()->create([
                'tarefa_id'=> Tarefa::all()->random()->id
            ]);
        }
    }
}
