<aside class="w-64 h-screen bg-gray-800 text-white flex flex-col">
    <div class="p-4">
        <h1 class="text-3xl font-bold uppercase text-center">Dashboard</h1>
        <p class="text-sm text-center text-gray-300">Gestor de Proyectos</p>
    </div>
    <nav class="mt-5 flex-1">
        <ul>
            <li class="mb-2">
                <a href="{{ route('home') }}" 
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'home' ? 'bg-indigo-700 text-white' : '' }}"
                >
                    Inicio
                </a>
            </li>
            <li class="mb-2">
                <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 ">
                    Proyectos
                </a>
            </li>
            <li class="mb-2">
                <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700">
                    Tareas
                </a>
            </li>
            <li class="mb-2">
                <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700">
                    Perfil
                </a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 w-full text-left">Cerrar Sesión</button>
            </form>
        </ul>
    </nav>
</aside>

