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
            <div class="bg-green-500 text-white font-bold p-4 rounded-lg mb-6 text-center my-10" id="success">
             {{ session('success') }}
            </div>

        @endif
@if (count($userProjects) === 0)
    <h2 class="text-xl font-bold mt-10 text-center">No hay proyectos registrados</h2>
@else
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4 max-w-7xl">
    @foreach ($userProjects as $proyecto)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out h-full flex flex-col animate-slide-left project-item ">
            <div class="flex-1">
                <h2 class="text-xl font-bold mb-2">{{ $proyecto->nombre }}</h2>
                <img src="{{ asset('img/proyecto.svg') }}" alt="imagen proyecto" class="mb-4 w-full h-auto">
                <p class="text-gray-600 mb-4">{{ $proyecto->descripcion }}</p>
            </div>
            <p class="font-bold">Actualmente tienes 0 tareas en este proyecto</p>
            <div class="flex justify-between items-center">
                <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button
                        title="Eliminar Proyecto"
                        type="submit" 
                        class="mt-2 cursor-pointer bg-red-500 text-white font-bold p-2 rounded-lg hover:bg-red-600 transition-colors duration-300 ease-in-out delete-button"
                    >
                        <img src="{{ asset('img/delete.svg') }}" alt="eliminar proyecto" class="w-6">  
                    </button>                  
                    
                </form>

                <a
                    title="Ver Proyecto"
                     href="{{ route('proyectos.show', $proyecto) }}" 
                     class="mt-2 cursor-pointer bg-blue-500 text-white font-bold p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300 ease-in-out">
                    <img src="{{ asset('img/show.svg') }}" alt="img ojo" class="w-6" >
                      
                </a>

                <a 
                    title="Editar Proyecto"
                    href="{{ route('proyectos.edit', $proyecto) }}"
                    class="mt-2 cursor-pointer bg-green-500 text-white font-bold p-2 rounded-lg hover:bg-green-600 transition-colors duration-300 ease-in-out"    
                >
                 <img src="{{ asset('img/edit.svg') }}" alt="editar proyecto" class="w-6">
                </a>
                  

            </div>
            
        </div>
    @endforeach
</div>

    
@endif
@endSection
