@extends('layout.dashlayout')

@section('title')
    Notificaciones
@endSection

@section('sidebar')
<x-sidebar />
@endSection

@section('content')
<h2 class="text-2xl font-bold mb-4">Notificaciones</h2>

@if ($notifications->isEmpty())
    <p>No tienes notificaciones.</p>
@else
    <ul class="list-disc list-inside space-y-2">
        @foreach ($notifications as $notification)
            <li class="text-gray-700">
                {{ $notification->data['message'] }}
                <a href="{{ route('proyectos.show', $notification->data['proyecto_id']) }}" class="text-blue-500">Ver Proyecto</a>
                <form action="{{ route('proyectos.invitation.respond', [$notification->id, 'aceptar']) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-green-500">Aceptar</button>
                </form>
                <form action="{{ route('proyectos.invitation.respond', [$notification->id, 'rechazar']) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-red-500">Rechazar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif

@endSection