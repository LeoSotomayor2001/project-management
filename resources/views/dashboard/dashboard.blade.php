@extends('layout.dashlayout')

@section('title')
    Dashboard
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
    <h1 class="text-3xl text-center mb-5">Hola <span class="font-normal">{{ auth()->user()->name }}</span></h1>

    <div class="flex items-start justify-center min-h-screen">
        <div class="flex flex-wrap justify-center items-stretch w-full max-w-6xl">
            <div class="w-full md:w-1/3 lg:w-1/3 px-3 mb-6 flex justify-center items-stretch">
                <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out flex flex-col items-center w-full">
                    <h2 class="text-xl font-bold mb-2">Proyectos</h2>
                    <img src="{{ asset('img/proyecto.svg') }}" alt="">
                    <p class="text-gray-600">Actualmente tienes 0 proyectos</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/3 px-3 mb-6 flex justify-center items-stretch">
                <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out flex flex-col items-stretch w-full">
                    <h2 class="text-xl font-bold mb-2">Tareas</h2>
                    <img src="{{ asset('img/tareas.svg') }}" alt="">
                    <p class="text-gray-600">Actualmente tienes 0 tareas</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/3 px-3 mb-6 flex justify-center items-stretch" >
                <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out flex flex-col items-stretch w-full">
                    <h2 class="text-xl font-bold mb-2">Usuarios</h2>
                    <img src="{{ asset('img/usuarios.svg') }}" alt="" >
                    <p class="text-gray-600">Actualmente tienes 0 usuarios colaborando contigo</p>
                </div>
            </div>
        </div>
    </div>
@endSection

