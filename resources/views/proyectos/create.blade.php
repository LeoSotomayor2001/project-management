@extends('layout.dashlayout')

@section('title')
    Crear Proyecto
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">Crear Proyecto</h1>
<div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl m-auto">
    <form method="POST" action="{{ route('proyectos.create') }}" novalidate>
        @csrf
        <div class="mb-5">
            <label for="nombre" class="block uppercase text-gray-500 font-bold mb-2">Nombre</label>
            <input 
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Ej: Sistema de inventario"    
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{ old('nombre') }}"
            >
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="descripcion" class="block uppercase text-gray-500 font-bold mb-2">Descripción</label>
            <textarea
                id="descripcion"
                name="descripcion"
                placeholder="Debe estar hecho en laravel y react"    
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{ old('descripcion') }}"
            ></textarea>
            @error('descripcion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-200">
                Crear Proyecto
            </button>
        </div>
    </form>
</div>
@endSection