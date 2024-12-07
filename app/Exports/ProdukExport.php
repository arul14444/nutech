<?php

namespace App\Exports;

use App\Models\ProdukModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ProdukExport implements FromQuery
{
    use Exportable;
    protected $search, $kd_kategori;
    public function __construct(string $search = "", string $kd_kategori = "")
    {
        $this->search = $search;
        $this->kd_kategori = $kd_kategori;
    }

    public function query()
    {
        return ProdukModel::query()
            ->select('produk.nama_produk', 'produk.harga_barang', 'kategori.kategori', 'produk.harga_jual', 'produk.path_gambar', 'produk.stok')
            ->leftJoin('kategori', 'produk.kd_kategori', '=', 'kategori.kd_kategori')
            ->when($this->search, function ($query) {
                return $query->where('produk.nama_produk', 'like', '%' . $this->search . '%');
            })->when($this->kd_kategori, function ($query) {
                return $query->where('produk.kd_kategori', $this->kd_kategori);
            });
    }
}
