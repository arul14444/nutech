<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk',
        'harga_barang',
        'harga_jual',
        'kategori_id',
        'kd_kategori',
        'stok',
        'path_gambar',
        'id',
        'uuid',
    ];
    protected $hidden = ['created_at', 'updated_at','id'];
    public $timestamps = false;
}
