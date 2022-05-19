<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcador_has_Tarefa extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'Marcador_id',
        'Tarefa_id'
    ];
}
