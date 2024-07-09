<div class="md:h-screen flex flex-col">
    <div class="p-4">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </div>
    <nav class="mt-5 flex-1 overflow-y-auto">
        <ul>
            <li class="mb-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 py-1.5 px-2 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'home' ? 'bg-indigo-700 text-white' : '' }}">
                    <img src="{{ asset('img/home.svg') }}" alt="icono home" class="w-6">
                    Inicio
                </a>
            </li>
            <li class="mb-2">
                <a 
                    href="{{ route('proyectos.index') }}" 
                    class="flex items-center gap-2 py-1.5 px-2 rounded transition duration-200 hover:bg-indigo-700 {{ isCurrentRouteIn(['proyectos.index', 'proyectos.create', 'proyectos.edit', 'proyectos.show']) ? 'bg-indigo-700 text-white' : '' }}"
                >
                    <img src="{{ asset('img/iconproject.svg') }}" alt="icono proyecto" class="w-6">
                    Proyectos
                </a>

            </li>
            <li class="mb-2">
                <a href="{{ route('tareas.index') }}" 
                class="flex items-center gap-2 py-1.5 px-2 rounded transition duration-200 hover:bg-indigo-700 {{ isCurrentRouteIn(['tareas.index', 'tareas.create', 'tareas.edit', 'tareas.show']) ? 'bg-indigo-700 text-white' : '' }}">
                    <img src="{{ asset('img/task.svg') }}" alt="icono tarea" class="w-6">
                    Tareas
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('notificaciones.index') }}" 
                    class="flex items-center gap-2 py-1.5 px-2 rounded transition duration-200 hover:bg-indigo-700 {{ Route::currentRouteName() == 'notificaciones.index' ? 'bg-indigo-700 text-white' : '' }}"
                >   
                    <img src="{{ asset('img/notification.svg') }}" alt="icono notificacion" class="w-6">
                    <span>Notificaciones</span>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        ({{ auth()->user()->unreadNotifications->count() }})
                    @endif
                
                </a>
            </li>
            <li class="mb-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full py-1.5 px-2 rounded transition duration-200 hover:bg-red-700 text-left">
                        <img src="{{ asset('img/logout.svg') }}" alt="icono salir" class="w-6">
                        Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
