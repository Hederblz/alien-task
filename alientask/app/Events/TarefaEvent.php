<?php

namespace App\Events;

class TarefaEvent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;        
    }
}