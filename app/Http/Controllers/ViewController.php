<?php

namespace App\Http\Controllers;

use App\Repository\KategoriRepository;
use App\Repository\ProdukRepository;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $produkRepository, $kategoriRepository;

    public function __construct(
        ProdukRepository $produkRepository,
        KategoriRepository $kategoriRepository
    ) {
        $this->produkRepository = $produkRepository;
        $this->kategoriRepository = $kategoriRepository;
    }
    public function login()
    {
        return view('Login');
    }

    public function registerView()
    {
        return view('Registrasi');
    }

    public function daftarProduk(Request $request)
    {
        $search = $request->input('search');
        $kd_kategori = $request->input('kd_kategori');
        $dataProduk=$this->produkRepository->getProduk();
        if ($search) {
            $dataProduk = $dataProduk->where('produk.nama_produk', 'like', '%' . $search . '%');
        }if ($kd_kategori) {
            $dataProduk = $dataProduk->where('produk.kd_kategori', $kd_kategori);
        }

        $data = [
            'produk' => $dataProduk->paginate(10),
            'kategori' => $this->kategoriRepository->getAll()
        ];

        return view('DaftarProduk')->with('data', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'kategori' => $this->kategoriRepository->getAll()
        ];
        return view('TambahProduk')->with('data', $data);
    }

    public function editProduk(Request $request)
    {
        $data = [
            'produk' => $this->produkRepository->findByUuid($request->uuid),
            'kategori' => $this->kategoriRepository->getAll()
        ];
        return view('EditProduk')->with('data', $data);
    }

    public function profil()
    {
        return view('Profil');
    }
}
