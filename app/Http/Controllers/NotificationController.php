<?php

namespace App\Http\Controllers;

use App\Models\proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {   
        $notifications = auth()->user()->unreadNotifications;
        return view('notifications.index', compact('notifications'));
    }

    public function respond(Request $request, DatabaseNotification $notification, $action)
    {
        $proyecto = proyecto::find($notification->data['proyecto_id']);
        $user = User::find($notification->notifiable_id);

        if ($action === 'aceptar') {
            $proyecto->users()->attach($user);
            $notification->markAsRead();
            return redirect()->route('proyectos.show', $proyecto)->with('success', 'Has aceptado la invitación al proyecto.');
        } elseif ($action === 'rechazar') {
            $notification->markAsRead();
            return redirect()->route('notifications.index')->with('success', 'Has rechazado la invitación al proyecto.');
        }

        return redirect()->route('notificaciones.index')->with('error', 'Acción no válida.');
    }
}
