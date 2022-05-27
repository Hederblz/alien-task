<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcador extends Model
{
    use HasFactory;
    protected $table = 'marcadores';
    protected $fillable = [
        'titulo',
        'cor',
        'tarefa_id',
        'user_id'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id'); //Marcador pertence a user;
    }

    public function tarefas()
    {
        return $this->belongsToMany(Tarefa::class, 'marcador_id'); //Marcador pertence a tarefas;
    }
}
