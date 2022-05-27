<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tarefas(){
        return $this->hasMany(Tarefa::class, 'user_id'); //Usuario possui tarefas;
    }

    public function notas()
    {
        return $this->hasMany(Nota::class, 'user_id'); //Usuario possui notas;
    }

    public function historico()
    {
        return $this->hasOne(Historico::class, 'user_id'); //Usuario possui um historico;
    }

    public function marcadores()
    {
        return $this->hasMany(Marcador::class, 'user_id'); //Usuario possui marcadores;
    }

}
