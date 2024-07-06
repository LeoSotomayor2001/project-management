@extends('layout.dashlayout')

@section('title')
Tareas
@endSection

@section('sidebar')
<x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">Tareas</h1>
<a href="{{ route('tareas.create') }}"
    class="my-5 text-xl px-4 py-2 rounded-lg bg-green-500 text-white hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
    Crear Tarea
</a>
@if (session('success'))
<div class="bg-green-500 text-white font-bold p-4 rounded-lg mb-6 text-center my-10" id="success">
    {{ session('success') }}
</div>

@endif
@if (count($tareas) === 0)
<h2 class="text-xl font-bold mt-10 text-center">No hay tareas registradas</h2>
@else
<div class="max-w-7xl mt-4">
    <!-- Encabezado de la tabla para pantallas grandes -->
    <div class="hidden md:grid md:grid-cols-4 gap-6 bg-gray-200 p-4 rounded-lg">
        <div class="font-bold">Nombre</div>
        <div class="font-bold">Estado</div>
        <div class="font-bold">Proyecto</div>
        <div class="font-bold">Acciones</div>
    </div>

    <!-- Contenido de la tabla -->
    <div class="grid grid-cols-1 gap-6">
        @foreach ($tareas as $tarea)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out h-full animate-slide-left project-item">
            <!-- Encabezados para pantallas pequeñas -->
            <div class="md:hidden">
                <div class="font-bold">Nombre</div>
                <div>{{ $tarea->nombre }}</div>
                <div class="font-bold">Estado</div>
                <div>{{ $tarea->estado_texto }}</div>
                <div class="font-bold">Proyecto</div>
                <div>{{ $tarea->proyecto->nombre }}</div>
                <div class="font-bold">Acciones</div>
                <div class="flex justify-start">
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input 
                            type="submit" 
                            value="Eliminar" 
                            class="cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out delete-button"
                        >
                    </form>
                </div>
            </div>
            <!-- Encabezados y contenido para pantallas grandes -->
            <div class="hidden md:grid md:grid-cols-4 gap-6">
                <div>{{ $tarea->nombre }}</div>
                <div>{{ $tarea->estado_texto }}</div>
                <div>{{ $tarea->proyecto->nombre }}</div>
                <div class="flex justify-end md:justify-start">
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input 
                            type="submit" 
                            value="Eliminar" 
                            class="cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out delete-button"
                        >
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




@endif
@endSection