<!-- resources/views/components/header.blade.php -->
<header class="flex flex-col sm:flex-row items-center justify-between p-3 bg-white text-black shadow">
    <a href="/" class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-500 via-blue-500 to-red-600 mb-3 sm:mb-0">
        Gestor de Proyectos
    </a>
    <nav class="flex items-center gap-4">
        <a href="{{ route('register') }}" class="text-xl px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 hover:shadow-lg transition duration-300 ease-in-out">
            Registro
        </a>
        <a href="#" class="text-xl px-4 py-2 rounded-lg bg-green-500 text-white hover:bg-green-600 hover:shadow-lg transition duration-300 ease-in-out">
            Iniciar Sesión
        </a>
    </nav>
</header>
