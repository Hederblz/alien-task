<?php

namespace Database\Seeders;

use App\Models\Marcador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marcador::factory()
       ->count(10)
       ->create();
    }
}
