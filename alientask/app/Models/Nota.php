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
         'etiquetas',
         'user_id'
     ];

     protected $casts = [
      'etiquetas' => 'array'
     ];

     public function dono(){

        return $this->belongsTo(User::class, 'user_id');
     }
     
     public function etiquetas()
     {
      return $this->hasMany(Etiqueta::class);
     }
     
}
