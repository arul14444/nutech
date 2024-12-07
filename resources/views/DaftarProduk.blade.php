@extends('layout.MainLayout')
@section('title', 'Daftar Produk')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-semibold">Daftar Produk</h1>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div class="flex space-x-2">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-black border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
            </div>
            <select class="block p-2 text-sm text-black border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" id="filterKategori" name="filter_kategori" aria-label="Filter Kategori">
                <option value="">Semua</option>
                <option value="alat_olahraga">Alat Olahraga</option>
                <option value="alat_musik">Alat Musik</option>
            </select>
        </div>
        <div class="flex space-x-2">
            <a href="#" class="px-4 py-2 bg-[#19761c] text-white rounded-md flex items-center space-x-2">
                <img src="{{asset('Assets/ExcelLogo.png')}}" class="w-5 h-5"> 
                <span>Exsport excel</span>
            </a>
            <a href="{{ route('tambah-produk') }}" class="px-4 py-2 bg-[#f23c2e] text-white rounded-md flex items-center space-x-2">
                <img src="{{asset('Assets/PlusCircle.png')}}" class="w-5 h-5"> 
                <span>Tambah Produk</span>
            </a>
        </div>
    </div>
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-black bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">Kategori Produk</th>
                <th scope="col" class="px-6 py-3">Harga Beli (Rp)</th>
                <th scope="col" class="px-6 py-3">Harga Jual (Rp)</th>
                <th scope="col" class="px-6 py-3">Stok Produk</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white hover:bg-gray-100">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">Produk A</td>
                <td class="px-6 py-4">Kategori 1</td>
                <td class="px-6 py-4">Rp. 50.000</td>
                <td class="px-6 py-4">10</td>
                <td class="px-6 py-4">50</td>
                <td class="px-6 py-4">Rp. 500.000</td>
                <td class="px-6 py-4">
                    <button class="px-4 rounded-md"><img src="{{asset('Assets/edit.png')}}"></button>
                    <button class="px-4 py-2 rounded-md"><img src="{{asset('Assets/delete.png')}}"></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
