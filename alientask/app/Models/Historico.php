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
        'registravel_id',
        'registravel_type',
    ];

    public function dono()
    {
        return $this->belongsTo(User::class, 'user_id'); //Historico pertence a usuario;
    }

    public function registravel()
    {
        return $this->morphTo();
    }
}
