@extends('layout.dashlayout')

@section('title')
{{$proyecto->nombre}}
@endSection

@section('sidebar')
<x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">{{$proyecto->nombre}}</h1>
<div class="md:w-auto bg-white p-6 rounded-lg shadow-xl text-xl">
    <p class="text-gray-600 mb-4 border-b border-b-green-800">
        Creado el <span class="font-semibold">{{ $proyecto->formatFecha() }}</span> por
        <span class="font-semibold">{{ $proyecto->creator->name }}</span>
    </p>
    <p class="text-gray-600 mb-4">{{ $proyecto->descripcion }}</p>
    </p>

    @if (count($tareas) > 0)
        <p class="text-gray-600 mb-4">Lista de tareas:
        </p>
        <ul class="list-disc list-inside space-y-2">
            
            @foreach ($tareas as $tarea)
                <li class="text-gray-700">{{ $tarea->nombre }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No hay tareas</p>
    @endif

    <h2 class="text-2xl font-bold mb-4">Colaboradores</h2>

    @if ($usersProject->isEmpty())
        <p>No hay colaboradores en este proyecto.</p>
    @else
        <ul class="list-disc list-inside space-y-2">
            @foreach ($usersProject as $user)
                <li class="text-gray-700">{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    @endif
</div>

@endSection