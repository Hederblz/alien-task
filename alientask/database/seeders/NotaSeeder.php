<?php

namespace Database\Seeders;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Nota::factory()
        ->count(10)
        ->create();
    }
}
