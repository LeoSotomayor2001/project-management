<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    @yield('header')

    <main>
        @yield('content')

    </main>

    <footer class="text-center font-bold mt-10 p-5 text-gray-600">
        Project-Management. Todos los derechos reservados. Leodomí Sotomayor {{now()->year}}
    </footer>

</body>

</html>