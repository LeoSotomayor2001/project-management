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
            placeholder="Ej: Sistema de inventario"    
            class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror"
            value="{{ old('nombre', $proyecto->nombre ?? '') }}"
        >
        @error('nombre')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-5">
        <label for="descripcion" class="block uppercase text-gray-500 font-bold mb-2">Descripción</label>
        <textarea
            id="descripcion"
            name="descripcion"
            placeholder="Ej: Debe estar hecho en Laravel y React"    
            class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
        >{{ old('descripcion', $proyecto->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="flex justify-center">
        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-200 text-xl">
            {{ $buttonText }}
        </button>
    </div>
</form>