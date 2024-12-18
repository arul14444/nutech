<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f23c2e
        }
        .container {
            display: flex;
            width: 100%;
        }
        .form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #ffffff;
        }
        .logo-container {
            background-color: #f23c2e;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
        }
        .form-container button {
            padding: 10px;
            font-size: 16px;
            background-color: #f23c2e;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-10 w-auto" src="{{ asset('assets/logo.png') }}">
                    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Masuk atau buat akun untuk memulai</h2>
                </div>
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{route('login.sistem')}}" method="POST">
                        @csrf
                        <div>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" placeholder="@ masukan email anda" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <input type="password" name="password" id="password" placeholder="masukan password anda" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
                        </div>
                    </form>
                    @if(session('error'))
                    <div class="mt-4 bg-red-100 border border-red-400 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Gagal!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                        
                    @endif
                    <p class="mt-10 text-center text-sm/6 text-gray-500">
                        belum punya akun?
                        <a href=   "{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">klik untuk daftar</a>
                  
                      </p>
                </div>
            </div>
        </div>
        <div class="logo-container">
            <img src="{{ asset('assets/Login.png') }}" alt="Logo">
        </div>
    </div>
</body>
</body>
</html>