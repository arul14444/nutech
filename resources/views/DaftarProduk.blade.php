@extends('layout.MainLayout')
@section('title', 'Daftar Produk')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-semibold">Daftar Produk</h1>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
       <form id="filterForm" action="" method="GET">
        <div class="flex space-x-2">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" name="search" class="block p-2 ps-10 text-sm text-black border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari barang" value="{{ request('search') }}">
            </div>
            <select class="block p-2 text-sm text-black border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" id="filterKategori" name="kd_kategori" aria-label="Filter Kategori">
                <option value="">Semua</option>
                @foreach($data['kategori'] as $kategori)
                    <option value="{{ $kategori->kd_kategori }}" {{ request('kd_kategori') == $kategori->kd_kategori ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>
       </form>
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
            @foreach($data['produk'] as $index => $produk)
            <tr class="bg-white hover:bg-gray-100">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4"><img src="{{ asset($produk->path_gambar) }}" alt="{{ $produk->nama_produk }}" class="w-10 h-10"></td>
                <td class="px-6 py-4">{{ $produk->nama_produk }}</td>
                <td class="px-6 py-4">{{ $produk->kategori }}</td>
                <td class="px-6 py-4">{{ number_format($produk->harga_barang, 0, ',', '.') }}</td>
                <td class="px-6 py-4">{{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                <td class="px-6 py-4">{{ $produk->stok }}</td>
                <td class="px-6 py-4 flex space-x-2">
                    <a href="/edit-produk/{{$produk->uuid}}" class="px-4 rounded-md flex items-center justify-center"><img src="{{asset('Assets/edit.png')}}" class="w-5 h-5"></a>
                    <form action="/delete-produk/{{$produk->uuid}}" method="POST" class="px-4 py-2 rounded-md flex items-center justify-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="{{asset('Assets/delete.png')}}" class="w-5 h-5"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $data['produk']->links() }}
</div>

<script>
document.getElementById('filterKategori').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

document.getElementById('table-search').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('filterForm').submit();
    }
});
</script>

@endsection
