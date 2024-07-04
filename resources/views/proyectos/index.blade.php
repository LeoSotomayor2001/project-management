@extends('layout.dashlayout')

@section('title')
    Proyectos
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">Proyectos</h1>
<a href="{{ route('proyectos.create') }}" class="my-5 text-xl px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 hover:shadow-lg transition duration-300 ease-in-out">
    Crear Proyecto
</a>
@if (session('success'))
            <div class="bg-green-500 text-white font-bold p-4 rounded-lg mb-6 text-center my-10">
             {{ session('success') }}
            </div>

        @endif
@if (count($userProjects) === 0)
    <h2 class="text-xl font-bold mt-10 text-center">No hay proyectos registrados</h2>
@else
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4 max-w-7xl">
    @foreach ($userProjects as $proyecto)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out h-full flex flex-col animate-slide-left">
            <div class="flex-1">
                <h2 class="text-xl font-bold mb-2">{{ $proyecto->nombre }}</h2>
                <img src="{{ asset('img/proyecto.svg') }}" alt="imagen proyecto" class="mb-4 w-full h-auto">
                <p class="text-gray-600 mb-4">{{ $proyecto->descripcion }}</p>
            </div>
            <p class="font-bold">Actualmente tienes 0 tareas en este proyecto</p>
            <form action="{{route('proyectos.destroy', $proyecto)}}" method="POST">
                @csrf
                @method('DELETE')
                <input 
                    type="submit" 
                    id="delete-project"
                    value="Eliminar proyecto" 
                    class="mt-2 cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out"
                >
            </form>
        </div>
    @endforeach
</div>

    
@endif
@endSection
