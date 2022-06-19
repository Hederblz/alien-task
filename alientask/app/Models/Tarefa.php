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
        'data_final_prevista',
        'data_conclusao',
        'concluida',
        'marcadores',
        'user_id',
    ];

    protected $casts = [
        'marcadores' => 'array'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function marcadores()
    {
        return $this->hasMany(Marcador::class);
    }

    public function historico()
    {
       return $this->morphMany(Historico::class, 'registravel_id');
    }
}
