@extends('layout.MainLayout')
@section('title', 'Tambah Produk')

@section('content')
<div class="flex items-center ">
    <h1 class="text-3xl font-semibold text-gray-500 mr-4">Daftar Produk</h1> 
    <h1 class="text-3xl font-semibold mr-4"><</h1>
    <h1 class="text-3xl font-semibold">Tambah Produk</h1>
</div>

<form action="">        
    <div class="grid gap-2 mb-2 md:grid-cols-3">

        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
            <input type="text" id="last_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
        </div>
        <div class="md:col-span-2">
            <label for="namaProduk" class="block mb-2 text-sm font-medium text-gray-900">Nama barang</label>
            <input type="url" id="website" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite.com" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
            <input type="text" id="first_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
        </div>
        <div>
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Company</label>
            <input type="text" id="company" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Flowbite" required />
        </div>  
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone number</label>
            <input type="tel" id="phone" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
        </div>
        <div class="flex items-center justify-center w-full md:col-span-3">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <img src="{{asset('Assets/Image.png')}}" alt="" class="w-12 h-12 mb-2">
                    <p class="mb-2 text-sm text-gray-500">Upload gambar disini</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>
        </div> 
        <div class="md:col-span-3 flex justify-end">
            <a href="{{ route('daftar-produk') }}" class="bg-white border border-blue-500 text-blue-500 text-sm rounded-lg p-2.5 mr-2">Batalkan</a>
            <button type="submit" class="bg-blue-500 text-white text-sm rounded-lg p-2.5 ">Simpan</button>
        </div>

    </div>
</form>
@endsection