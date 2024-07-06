<div class="md:h-screen flex flex-col">
    <div class="p-4">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </div>
    <nav class="mt-5 flex-1 overflow-y-auto">
        <ul>
            <li class="mb-2 ">
                <a href="{{ route('home') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'home' ? 'bg-indigo-700 text-white' : '' }}">
                    Inicio
                </a>
            </li>
            <li class="mb-2">
                <a 
                    href="{{ route('proyectos.index') }}" 
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'proyectos.index' 
                    ||  Route::currentRouteName() == 'proyectos.create' ||  Route::currentRouteName() == 'proyectos.edit'  ||  Route::currentRouteName() == 'proyectos.show' ? 'bg-indigo-700 text-white' : '' }}">
                    Proyectos
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('tareas.index') }}" 
                class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'tareas.index' || Route::currentRouteName() == 'tareas.create' ||  Route::currentRouteName() == 'tareas.edit' ? 'bg-indigo-700 text-white' : '' }}">
                    Tareas
                </a>
            </li>
            <li class="mb-2">
                <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'profile.show' ? 'bg-indigo-700 text-white' : '' }}">
                    Perfil
                </a>
            </li>
            <li class="mb-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 text-left">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </nav>
</div>
