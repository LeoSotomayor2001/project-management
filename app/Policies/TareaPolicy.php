<?php

namespace App\Policies;

use App\Models\Tarea;
use App\Models\User;

class TareaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    
    public function Completar(User $user, Tarea $tarea)
    {
        return $tarea->estado !== 1;
    }
}
