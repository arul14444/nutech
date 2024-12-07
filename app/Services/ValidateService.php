<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService
{
    public function validateStoreProduk($request)
    {
        return Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga_barang' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'nama_produk.required' => 'Nama barang tidak boleh kosong',
            'harga_barang.required' => 'Harga beli tidak boleh kosong',
            'harga_barang.numeric' => 'Harga beli harus berupa angka',
            'harga_jual.required' => 'Harga jual tidak boleh kosong',
            'harga_jual.numeric' => 'Harga jual harus berupa angka',
            'stok_barang.required' => 'Stok barang tidak boleh kosong',
            'stok_barang.numeric' => 'Stok barang harus berupa angka',
            'kategori.required' => 'Kategori tidak boleh kosong',
            'gambar.required' => 'Gambar tidak boleh kosong',
            'gambar.image' => 'File yang diupload harus berupa gambar',
            'gambar.mimes' => 'File yang diupload harus berformat jpeg, png, jpg, gif, atau svg',
            'gambar.max' => 'Ukuran file yang diupload tidak boleh lebih dari 2MB',
        ]
    );
    }

    public function validateUpdateProduk($request)
    {
        return Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga_barang' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'kategori' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'nama_produk.required' => 'Nama barang tidak boleh kosong',
            'harga_barang.required' => 'Harga beli tidak boleh kosong',
            'harga_barang.numeric' => 'Harga beli harus berupa angka',
            'harga_jual.required' => 'Harga jual tidak boleh kosong',
            'harga_jual.numeric' => 'Harga jual harus berupa angka',
            'stok_barang.required' => 'Stok barang tidak boleh kosong',
            'stok_barang.numeric' => 'Stok barang harus berupa angka',
            'kategori.required' => 'Kategori tidak boleh kosong',
            'gambar.image' => 'File yang diupload harus berupa gambar',
            'gambar.mimes' => 'File yang diupload harus berformat jpeg, png, jpg, gif, atau svg',
            'gambar.max' => 'Ukuran file yang diupload tidak boleh lebih dari 2MB',
        ]
    );
    }

}