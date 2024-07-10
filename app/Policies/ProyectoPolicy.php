<?php

namespace App\Policies;

use App\Models\User;
use App\Models\proyecto;
use Illuminate\Auth\Access\Response;

class ProyectoPolicy
{
    public function invitar(User $user, proyecto $proyecto)
    {
        return $user->id === $proyecto->usuario_id;
    }
    public function acciones(User $user, proyecto $proyecto)
    {
        return $user->id === $proyecto->usuario_id;
    }
    
}
