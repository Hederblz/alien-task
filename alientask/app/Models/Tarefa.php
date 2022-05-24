<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function dono()
    {
        return 0;
    }

    public function historicoTarefa()
    {
        return 0;
    }
}
