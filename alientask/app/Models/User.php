<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'tarefas_criadas',
        'tarefas_editadas',
        'tarefas_excluidas',
        'tarefas_concluidas',
        'notas_criadas',
        'notas_editadas',
        'notas_excluidas',
        'etiquetas_criadas',
        'etiquetas_editadas',
        'etiquetas_excluidas'
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
        return $this->hasMany(Tarefa::class, 'user_id')->orderBy('data_final_prevista', 'ASC');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class, 'user_id');
    }

    public function etiquetas()
    {
        return $this->hasMany(Etiqueta::class, 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

}
