<?php

namespace App\Repository;

use App\Models\ProdukModel;

class ProdukRepository
{
    protected $produkModel;

    public function __construct(
        ProdukModel $produkModel
    ) {
        $this->produkModel = $produkModel;
    }

    public function getProduk()
    {
        return ProdukModel::from('produk')
            ->select('produk.nama_produk', 'produk.harga_barang', 'kategori.kategori', 'produk.harga_jual','produk.path_gambar', 'produk.stok', 'produk.uuid')
            ->leftJoin('kategori', 'produk.kd_kategori', '=', 'kategori.kd_kategori');
    }

    public function findByUuid($uuid)
    {
        return $this->produkModel->where('uuid', $uuid)->first();
    }

    public function store($data)
    {
        return $this->produkModel->create($data);
    }

    public function update($uuid,$data)
    {
        return $this->produkModel->where('uuid', $uuid)->update($data);
    }

    public function delete($uuid)
    {
        return $this->produkModel->where('uuid', $uuid)->delete();
    }
}
