<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcador extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'cor',
        'user_id'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tarefas()
    {
        return $this->belongsToMany(Tarefa::class);
    }

    public function notas()
    {
        return $this->belongsToMany(Nota::class);
    }
}
