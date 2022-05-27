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
        'data_criacao',
        'data_inicio',
        'data_final_prevista',
        'data_conclusao',
        'concluida',
        'marcador_id',
        'user_id'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id'); //Tarefa pertence ao Usuario;
    }

    public function marcadores()
    {
        return $this->hasMany(Marcador::class, 'tarefa_id'); //Tarefa possui marcadores;
    }
}
