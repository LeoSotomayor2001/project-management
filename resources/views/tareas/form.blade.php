<form method="POST" action="{{ $action }}" novalidate>
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-5">
        <label for="nombre" class="block uppercase text-gray-500 font-bold mb-2">Nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ej: Crear un login"    
            class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror"
            value="{{ old('nombre', $tarea->nombre ?? '') }}"
        >
        @error('nombre')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="nombre" class="block uppercase text-gray-500 font-bold mb-2">Proyecto al que pertenece</label>
        <select
            name="proyecto_id"
            id="proyecto_id"
            class="border p-3 w-full rounded-lg @error('proyecto_id') border-red-500 @enderror"
        >
            <option value="" selected disabled>-- Selecciona un proyecto --</option>
            @foreach ($proyectos as $proyecto)
                <option
                    value="{{ $proyecto->id }}"
                    {{ old('proyecto_id', $tarea->proyecto_id ?? '') == $proyecto->id ? 'selected' : '' }}
                >
                    {{ $proyecto->nombre }}
                </option>
            @endforeach
        </select>
        @error('proyecto_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="fecha" class="block uppercase text-gray-500 font-bold mb-2">Fecha</label>
        <input
            type="date"
            id="fecha"
            name="fecha"
            class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror"
            value="{{ old('fecha', $tarea->fecha ?? '') }}"
        >
        @error('fecha')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="flex justify-center">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200 text-xl">
            {{ $buttonText }}
        </button>
    </div>
</form>