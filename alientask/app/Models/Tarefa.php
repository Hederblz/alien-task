<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'datacriacao',
        'datainicio',
        'datafinalprevista',
        'dataconclusao',
        'estado',
        'user_id'
    ];
}
