<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
     protected $fillable  = [
        'titulo',
         'conteudo',
         'marcador_id',
         'user_id'
     ];

     public function dono(){

        return $this->belongsTo(User::class, 'user_id'); //Nota pertence ao Usuario;
     }

     public function marcadores()
     {
         return $this->hasMany(Marcador::class, 'marcador_id'); //Nota possui marcadores;
     }
}
