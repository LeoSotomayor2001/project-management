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
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ isCurrentRouteIn(['proyectos.index', 'proyectos.create', 'proyectos.edit', 'proyectos.show']) ? 'bg-indigo-700 text-white' : '' }}"
                >
                    Proyectos
                </a>

            </li>
            <li class="mb-2">
                <a href="{{ route('tareas.index') }}" 
                class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ isCurrentRouteIn(['tareas.index', 'tareas.create', 'tareas.edit', 'tareas.show']) ? 'bg-indigo-700 text-white' : '' }}">
                    Tareas
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('notificaciones.index') }}" 
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'notificaciones.index' ? 'bg-indigo-700 text-white' : '' }}"
                >
                    <span>Notificaciones</span>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        ({{ auth()->user()->unreadNotifications->count() }})
                    @endif
                
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
