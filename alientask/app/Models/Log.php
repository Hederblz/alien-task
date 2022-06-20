<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'loggable_id',
        'loggable_type'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loggable() {
        return $this->morphTo();
    }
}
