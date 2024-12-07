<?php

namespace App\Http\Controllers;

use App\Repository\KategoriRepository;
use App\Repository\ProdukRepository;
use App\Services\ValidateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    protected $produkRepository, $validateService, $kategoriRepository;
    public function __construct(
        ProdukRepository $produkRepository,
        ValidateService $validateService,
        KategoriRepository $kategoriRepository
    ) {
        $this->produkRepository = $produkRepository;
        $this->validateService = $validateService;
        $this->kategoriRepository = $kategoriRepository;
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->validateService->validateStoreProduk($request);
            if ($validator->fails()) {
                $msg = $validator->errors()->all();
                return redirect('/tambah-produk')->with('alert', 'Data produk gagal ditambahkan: ' . $msg[0]);
            }
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $namaGambar = $gambar->getClientOriginalName();
                $namaGambarBaru = $gambar->getClientOriginalName() . '_' . random_int(1, 999) . '.'. $gambar->getClientOriginalExtension();
                $gambar->move('GambarProduk', $namaGambarBaru);
                $path = 'GambarProduk/' . $namaGambarBaru;
            }
            $dataKategori= $this->kategoriRepository->findByCode($request->kategori);
            $data = [
                'nama_produk' => $request->nama_produk,
                'harga_barang' => $request->harga_barang,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok_barang,
                'kategori_id' => $dataKategori->id,
                'kd_kategori' => $dataKategori->kd_kategori,
                'nama_gambar' =>  $namaGambar,
                'path_gambar' => $path,
                'id' => random_int(0, PHP_INT_MAX),
                'uuid' => Str::uuid()->toString(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $this->produkRepository->store($data);
            DB::commit();

            return redirect('/daftar-produk')->with('success', 'Data produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/tambah-produk')->with('alert', 'Data produk gagal ditambahkan: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->validateService->validateUpdateProduk($request);
            if ($validator->fails()) {
            $msg = $validator->errors()->all();
            return redirect('edit-produk/' . $request->uuid)->with('alert', 'Data produk gagal diupdate: ' . $msg[0]);
            }
            $produk = $this->produkRepository->findByUuid($request->uuid);
            if ($request->hasFile('gambar')) {
            if (file_exists(public_path($produk->path_gambar))) {
                unlink(public_path($produk->path_gambar));
            }
            $gambar = $request->file('gambar');
            $namaGambar = $gambar->getClientOriginalName();
            $namaGambarBaru = $gambar->getClientOriginalName() . '_' . random_int(1, 999) . '.'. $gambar->getClientOriginalExtension();
            $gambar->move('GambarProduk', $namaGambarBaru);
            $path = 'GambarProduk/' . $namaGambarBaru;
            } else {
            $namaGambar = $produk->nama_gambar;
            $path = $produk->path_gambar;
            }
            $dataKategori = $this->kategoriRepository->findByCode($request->kategori);
            $data = [
            'nama_produk' => $request->nama_produk,
            'harga_barang' => $request->harga_barang,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok_barang,
            'kategori_id' => $dataKategori->id,
            'kd_kategori' => $dataKategori->kd_kategori,
            'nama_gambar' => $namaGambar,
            'path_gambar' => $path,
            'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $this->produkRepository->update($request->uuid, $data);
            DB::commit();

            return redirect('/daftar-produk')->with('success', 'Data produk berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('edit-produk/' . $request->uuid)->with('alert', 'Data produk gagal diupdate: ' . $e->getMessage());
        }

        return redirect('/daftar-produk');
    }

    public function delete(Request $request)
    {
        $produk = $this->produkRepository->findByUuid($request->uuid);
        if (file_exists(public_path($produk->path_gambar))) {
            unlink(public_path($produk->path_gambar));
        }
        $this->produkRepository->delete($request->uuid);

        return redirect('/daftar-produk')->with('success', 'Data produk berhasil dihapus');
    }
}
