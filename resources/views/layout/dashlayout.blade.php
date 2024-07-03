<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen antialiased leading-none">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="md:w-1/4 bg-gray-800 text-white md:p-4">
            @yield('sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>

</html>
