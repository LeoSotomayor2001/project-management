@extends('layout.dashlayout')

@section('title')
    Editar Proyecto
@endSection

@section('sidebar')
    <x-sidebar />
@endSection

@section('content')
<div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl m-auto">
    @can('acciones', $proyecto)
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Editar Proyecto</h1>

            @include('proyectos.form', [
                'action' => route('proyectos.edit', $proyecto),
                'method' => 'PUT',
                'project' => $proyecto,
                'buttonText' => 'Guardar cambios'
            ])
        </div>
        
    @endcan
    @cannot('acciones', $proyecto)
        <h1 class="text-2xl font-bold mb-6">No tienes permisos para editar este proyecto</h1>
    @endcannot
</div>
@endSection