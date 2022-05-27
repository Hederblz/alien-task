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
        Historico::factory()
        ->count(10)
        ->create();
    }
}
