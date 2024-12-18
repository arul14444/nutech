@extends('layout.MainLayout')
@section('title', 'Edit Produk')

@section('content')
<div class="flex items-center ">
    <h1 class="text-3xl font-semibold text-gray-500 mr-4">Daftar Produk</h1> 
    <h1 class="text-3xl font-semibold mr-4"><</h1>
    <h1 class="text-3xl font-semibold">Edit Produk</h1>
</div>

<form action="{{ url('update-produk/' . $data['produk']->uuid) }}" method="POST" enctype="multipart/form-data">  
    @csrf      
    @method('PUT')
    <div class="grid gap-2 mb-2 md:grid-cols-3">
        <div>
            <label for="filterKategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
            <select class="block p-2 text-sm text-black border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="filterKategori" name="kategori" aria-label="Filter Kategori">
            <option disabled>Pilih kategori</option>
            @foreach($data['kategori'] as $kategori)
                <option value="{{ $kategori->kd_kategori }}" {{ $kategori->kd_kategori == $data['produk']->kd_kategori ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
            @endforeach
            </select>
        </div>
        <div class="md:col-span-2">
            <label for="namaProduk" class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
            <input type="text" id="namaProduk" name="nama_produk" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan nama barang" value="{{ $data['produk']->nama_produk }}" required />
        </div>
        <div>
            <label for="hargaBeli" class="block mb-2 text-sm font-medium text-gray-900">Harga Beli</label>
            <input type="text" id="hargaBeli" name="harga_barang" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan harga beli" value="{{ $data['produk']->harga_barang }}" required />
        </div>
        <div>
            <label for="hargaJual" class="block mb-2 text-sm font-medium text-gray-900">Harga Jual</label>
            <input type="text" id="hargaJual" name="harga_jual" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="masukan harga jual" value="{{ $data['produk']->harga_jual }}" required readonly />
        </div>  
        <div>
            <label for="stokBarang" class="block mb-2 text-sm font-medium text-gray-900">Stok Barang</label>
            <input type="number" id="stokBarang" name="stok_barang" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Stok Barang" value="{{ $data['produk']->stok }}" required />
        </div>
        <div class="flex items-center justify-center w-full md:col-span-3">
            <label for="gambar" class="flex flex-col items-center justify-center w-full h-64 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <img id="preview-image" src="{{ $data['produk']->path_gambar ? asset($data['produk']->path_gambar) : asset('Assets/Image.png') }}" alt="" class="max-w-full max-h-full mb-2">
            <p id="file-name" class="mb-2 text-sm text-gray-500">{{ $data['produk']->nama_gambar ? basename($data['produk']->path_gambar) : 'Upload gambar disini' }}</p>
            </div>
            <input id="gambar" name="gambar" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
            </label>
        </div> 

        <script>
            function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('preview-image');
            output.src = reader.result;
            output.classList.remove('max-w-full', 'max-h-full');
            output.classList.add('h-36');
            output.style.width = 'auto';
            };
            reader.readAsDataURL(event.target.files[0]);
            document.getElementById('file-name').textContent = event.target.files[0].name;
            }

            document.getElementById('hargaBeli').addEventListener('input', function() {
            let hargaBeli = parseInt(this.value);
            if (!isNaN(hargaBeli)) {
                let hargaJual = hargaBeli + (hargaBeli * 0.30);
                document.getElementById('hargaJual').value = hargaJual.toFixed(2);
                document.getElementById('hargaJual').removeAttribute('disabled');
            } else {
                document.getElementById('hargaJual').value = '';
                document.getElementById('hargaJual').setAttribute('disabled', 'disabled');
            }
            });
        </script>
        <div class="md:col-span-3 flex justify-end">
            <a href="{{ route('daftar-produk') }}" class="bg-white border border-blue-500 text-blue-500 text-sm rounded-lg p-2.5 mr-2">Batalkan</a>
            <button type="submit" class="bg-blue-500 text-white text-sm rounded-lg p-2.5 ">Simpan</button>
        </div>

    </div>
</form>
@endsection
@push('scripts')
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let hargaBeli = parseFloat(document.getElementById('hargaBeli').value);
        let hargaJual = parseFloat(document.getElementById('hargaJual').value);
        let stokBarang = parseInt(document.getElementById('stokBarang').value);

        if (isNaN(hargaBeli) || isNaN(hargaJual) || isNaN(stokBarang)) {
            alert('Harga dan stok harus berupa angka.');
            event.preventDefault();
            return;
        }

        let expectedHargaJual = hargaBeli + (hargaBeli * 0.30);
        if (hargaJual !== expectedHargaJual) {
            alert('Harga jual harus 30% lebih tinggi dari harga beli.');
            event.preventDefault();
        }
    });
</script>
@endpush
