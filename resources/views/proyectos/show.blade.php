@extends('layout.dashlayout')

@section('title')
{{$proyecto->nombre}}
@endSection

@section('sidebar')
<x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">{{$proyecto->nombre}}</h1>
@if (session('success'))
<div class="bg-green-500 text-white font-bold p-4 rounded-lg mb-6 text-center">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="bg-red-500 text-white font-bold p-4 rounded-lg mb-6 text-center">
    {{ session('error') }}
</div>
@endif
<div class="md:w-auto bg-white p-6 rounded-lg shadow-xl text-xl">
    <p class="text-gray-600 mb-4 border-b border-b-green-800">
        Creado el <span class="font-semibold">{{ $proyecto->formatFecha() }}</span> por
        <span class="font-semibold">{{ $proyecto->creator->name }}</span>
    </p>
    <p class="mb-1 font-bold text-2xl">Descripción:</p>
    <p class="text-gray-600 mb-4">{{ $proyecto->descripcion }}</p>
    </p>

    <p class="font-bold mb-4 text-2xl">
        Lista de tareas:
    </p>
    @if (count($tareas) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($tareas as $tarea)
                <div class="bg-white p-4 border border-gray-200 rounded-lg flex flex-col items-center">
                    <!-- Task content -->
                    <p class="text-gray-700">{{ $tarea->nombre }} - {{ $tarea->estado_texto }}</p>
                    @can('invitar', $proyecto)
                        @can('completar', $tarea)
                            <form action="{{ route('tareas.asignar', ['proyecto' => $proyecto->id, 'tarea' => $tarea->id]) }}" method="POST" class="w-full mt-4 flex items-center space-x-2">
                                @csrf
                                <label for="asignar" >Asignar tarea a:</label>
                                <select name="user_id" id="asignar-{{ $tarea->id }}" class="border p-1 rounded-lg flex-grow">
                                    @foreach ($usersProject as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-green-500 p-1 text-white rounded-lg hover:bg-green-600 transition duration-200" title="Asignar Tarea">
                                    <img src="{{ asset('img/asignar.svg') }}" alt="Asignar tarea" class="w-6">
                                </button>
                            </form>
                            
                            <div class="flex space-x-2">
                                <a href="{{ route('tareas.update', ['proyecto' => $proyecto->id, 'tarea' => $tarea->id]) }}" class="bg-yellow-500 p-1 text-white rounded-lg hover:bg-yellow-600 transition duration-200 inline-flex items-center space-x-1">
                                    <img src="{{ asset('img/edit.svg') }}" alt="Editar" class="w-6">
                                </a>
                                <form action="{{ route('tareas.destroy', ['proyecto' => $proyecto->id, 'tarea' => $tarea]) }}" method="POST" class="inline-flex items-center space-x-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 p-1 text-white rounded-lg hover:bg-red-600 transition duration-200 inline-flex items-center space-x-1">
                                        <img src="{{ asset('img/delete.svg') }}" alt="Eliminar" class="w-6">
                                    </button>
                                </form>
                            </div>
                            
                        @endcan
                    @endcan
                </div>
            @endforeach
        </div>
        
    
    
    
    @else
        <p class="text-gray-600">No hay tareas</p>
    @endif

    <h2 class="text-2xl font-bold mb-4">Colaboradores:</h2>
   
    @if ($usersProject->isEmpty())
        <p>No hay colaboradores en este proyecto.</p>
    @else
        <ul class="list-disc list-inside space-y-2 last-of-type:mb-6">
            @foreach ($usersProject as $user)
                <li class="text-gray-700">{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    @endif
    @can('invitar', $proyecto)
        <form action="{{ route('proyectos.invitar', $proyecto) }}" method="POST" class="mb-4" novalidate>
            @csrf
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico del Usuario</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            @error('email')
                <p class="text-red-500 text-xs mb-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Invitar</button>
        </form>
        
    @endcan
    
</div>

@endSection