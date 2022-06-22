<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
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
