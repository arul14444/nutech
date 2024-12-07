<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    @vite('resources/css/app.css')
</head>
<body>

    <div class="flex h-screen">

        <!-- Sidebar -->
       
        @include('layout.Sidebar')
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="grid gap-6">
                @yield('content')
            </div>
        </div>

    </div>

</body>
</html>
