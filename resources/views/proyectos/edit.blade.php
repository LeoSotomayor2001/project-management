@extends('layout.dashlayout')

@section('title')
    Editar Proyecto
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<h1 class="text-3xl text-center mb-5 font-bold">Crear Proyecto</h1>
<div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl m-auto">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Crear Proyecto</h1>

        @include('proyectos.form', [
            'action' => route('proyectos.edit', $proyecto),
            'method' => 'PUT',
            'project' => $proyecto,
            'buttonText' => 'Guardar cambios'
        ])
    </div>
</div>
@endSection