<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class InvitacionProyecto extends Notification
{
    use Queueable;
    protected $proyecto;
    /**
     * Create a new notification instance.
     */
     public function __construct($proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'proyecto_id' => $this->proyecto->id,
            'proyecto_nombre' => $this->proyecto->nombre,
            'message' => 'Has recibido una invitación para unirte al proyecto ' . $this->proyecto->nombre,
        ];
    }
}
