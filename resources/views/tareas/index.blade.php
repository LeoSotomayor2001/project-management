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
    <div class="hidden md:grid md:grid-cols-5 gap-6 bg-gray-200 p-4 rounded-lg">
        <div class="font-bold">Nombre</div>
        <div class="font-bold">Estado</div>
        <div class="font-bold">Proyecto</div>
        <div class="font-bold">Fecha de Entrega</div>
        <div class="font-bold">Acciones</div>
    </div>

    <!-- Contenido de la tabla -->
    <div class="grid grid-cols-1 gap-6">
        @foreach ($tareas as $tarea)
        <div
            class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out h-full animate-slide-left project-item">
            <!-- Encabezados para pantallas pequeñas -->
            <div class="md:hidden">
                <div class="font-bold">Nombre</div>
                <div>{{ $tarea->nombre }}</div>
                <div class="font-bold">Estado</div>
                <div>{{ $tarea->estado_texto }}</div>
                <div class="font-bold">Proyecto</div>
                <div>{{ $tarea->proyecto->nombre }}</div>
                <div class="font-bold">Fecha de Entrega</div>
                <div>{{ $tarea->formatFecha() }}</div>
                <div class="font-bold">Acciones</div>
                <div class="flex justify-start gap-2">
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out delete-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                    <a title="Editar tarea" href="{{ route('tareas.update', $tarea) }}"
                        class="cursor-pointer bg-green-500 text-white font-bold p-2 rounded-lg hover:bg-green-600 transition-colors duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </a>
                </div>
            </div>
            <!--contenido para pantallas grandes -->
            <div class="hidden md:grid md:grid-cols-5 gap-6">
                <div>{{ $tarea->nombre }}</div>
                <div>{{ $tarea->estado_texto }}</div>
                <div>{{ $tarea->proyecto->nombre }}</div>
                <div>{{ $tarea->formatFecha() }}</div>
                <div class="flex justify-end md:justify-start items-center gap-2">
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Eliminar tarea"
                            class="cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out delete-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                    <a title="Editar tarea" href="{{ route('tareas.update', $tarea) }}"
                        class="cursor-pointer bg-green-500 text-white font-bold p-2 rounded-lg hover:bg-green-600 transition-colors duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endSection