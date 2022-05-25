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
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'tarefa_id'); //Historico pertence a Tarefa;
    }
}
