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
        @include('layout.Sidebar')
        <div class="absolute top-4 right-4 w-1/4">
            <div class="bg-white rounded p-4" id="responseMessage">
            @if(session('alert'))
            <div class="bg-red-500 text-white p-2 rounded">
                {{ session('alert') }}
            </div>
            @elseif(session('success'))
            <div class="bg-green-500 text-white p-2 rounded">
                {{ session('success') }}
            </div>
            @endif  
            </div>
        </div>
        <div class="flex-1 p-8">
            <div class="grid gap-6">
                @yield('content')
            </div>
        </div>

    </div>
    <script>
        setTimeout(function() {
            document.getElementById('responseMessage').innerHTML = '';
        }, 5000);
    </script>
</body>
</html>
