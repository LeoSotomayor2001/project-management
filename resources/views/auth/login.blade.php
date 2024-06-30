@extends('layout.app')

@section('title')
Iniciar Sesión
@endSection

@section('header')
<x-header />
@endsection

@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center mt-10">
    <!-- Imagen a la izquierda -->
    <div class="md:w-4/12 p-5">
        <img src="{{ asset('img/register.png') }}" alt="Imagen registro de usuarios" class="w-96">
    </div>

    <!-- Formulario a la derecha -->
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        @if (session('message'))
            <div class="bg-green-500 text-white font-bold p-4 rounded-lg mb-6 text-center">
             {{ session('message') }}
            </div>

        @endif
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="mb-5">
                <label for="email" class="block uppercase text-gray-500 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="Ej: correo@gmail.com"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block uppercase text-gray-500 font-bold mb-2">Contraseña</label>
                <input type="password" id="password" name="password"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection