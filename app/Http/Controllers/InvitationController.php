<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitacionRequest;
use App\Models\invitation;
use App\Models\proyecto;
use App\Models\User;
use App\Notifications\InvitacionProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InvitationController extends Controller
{
    public function invitar(InvitacionRequest $request, Proyecto $proyecto)
    {
        // Verificar que el usuario autenticado sea el creador del proyecto
        Gate::authorize('invitar', $proyecto);

        // Validar los datos de la petición
        $request->validated();

        // Obtener el usuario que se va a invitar
        $user = User::where('email', $request->input('email'))->first();

        // Verificar que el usuario no sea colaborador del proyecto
        if ($proyecto->users->contains($user)) {
            // Redirigir al usuario a la vista de proyectos con mensaje de error
            return redirect()->back()->with('error', 'El usuario ya es colaborador de este proyecto.');
        }

        // Crear la invitación pendiente
        $invitacion = invitation::create([
            'proyecto_id' => $proyecto->id,
            'user_id' => auth()->id(),
            'invited_user_id' => $user->id,
        ]);

        // Enviar notificación al usuario invitado
        $user->notify(new InvitacionProyecto($proyecto));

        // Redirigir al usuario a la vista de proyectos con mensaje de éxito
        return redirect()->back()->with('success', 'Usuario invitado correctamente. Se ha enviado una notificación.');
    }
}
