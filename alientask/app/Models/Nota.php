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
         'user_id'
     ];
     public function nota(){

        return $this->belongsTo(User::class, 'user_id'); //Nota pertence ao Usuario;
     }
}
