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
        'etiquetas',
        'trancada',
        'user_id',
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function etiquetas()
    {
        return $this->hasMany(Etiqueta::class);
    }
    
}
