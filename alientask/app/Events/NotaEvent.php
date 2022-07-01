<?php

namespace App\Events;

class NotaEvent {
    public $user;

    public function __construct($user) {
        $this->user = $user;
    }
}