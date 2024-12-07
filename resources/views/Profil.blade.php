@extends('layout.MainLayout')
@section('title', 'Profil')
@section('content')
<div>
    <img src="{{asset('Assets/profil.jpeg')}}" alt="" style="border-radius: 50%; width: 10%; height: auto;">
    <h1 class="text-2xl font-bold" style="margin-top: 20px;">Mochamad Fachrul Andriansyah</h1>
</div>
<div>
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kandidat</label>
            <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="@ Mochamad Fachrul Andriansyah" disabled />
        </div>
        <div>
            <label for="posisi" class="block text-sm font-medium text-gray-700 mb-2">Posisi Kandidat</label>
            <input type="text" id="posisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="Website Programmer" disabled />
        </div>
</div>
@endsection