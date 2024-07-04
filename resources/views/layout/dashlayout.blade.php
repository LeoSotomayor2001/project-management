<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 min-h-screen antialiased leading-none">
    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="md:w-1/4 bg-gray-800 text-white md:p-4 md:h-full">
            @yield('sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </div>
    </div>
</body>


</html>
