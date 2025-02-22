@extends('layout.dashlayout')

@section('title')
    Crear Proyecto
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl m-auto">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Crear Proyecto</h1>

        @include('proyectos.form', [
            'action' => route('proyectos.create'),
            'method' => 'POST',
            'project' => new \App\Models\proyecto(),
            'buttonText' => 'Crear'
        ])
    </div>
</div>
@endSection