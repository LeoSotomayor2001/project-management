@extends('layout.dashlayout')

@section('title')
    Editar Tarea
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl m-auto">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Editar Tarea</h1>

        @include('tareas.form', [
            'action' => route('tareas.update', $tarea),
            'method' => 'PUT',
            'proyectos' => $proyectos,
            'tarea' => $tarea,
            'buttonText' => 'Guardar Cambios'
        ])
    </div>
</div>
@endSection