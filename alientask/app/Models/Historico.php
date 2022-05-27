<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'acao',
        'data',
        'tarefa_id',
        'nota_id'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id'); //Historico pertence a usuario;
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'tarefa_id'); //Historico possui tarefas;
    }

    public function notas()
    {
        return $this->hasMany(Nota::class, 'nota_id'); //Historico possui notas;
    }
}
