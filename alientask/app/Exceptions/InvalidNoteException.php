<?php

namespace App\Exceptions;

use Exception;

class InvalidNoteException extends Exception
{
/**
     * Get the exception's context information.
     *
     * @return array
     */
    public function context()
    {
        return ['titulo' => $this->titulo];
    }
    
}
