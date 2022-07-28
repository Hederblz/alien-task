<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'loggable_title',
        'loggable_type',
        'loggable_id',
        'user_id'
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tarefas()
    {
        return $this->morphTo(Tarefa::class, 'loggable');
    }

    public function notas()
    {
        return $this->morphTo(Nota::class, 'loggable');
    }

    public function etiquetas()
    {
        return $this->morphTo(Etiqueta::class, 'loggable');
    }
}
