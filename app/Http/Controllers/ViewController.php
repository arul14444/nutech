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

    public function daftarProduk()
    {
        $data = [
            'produk' => $this->produkRepository->getProduk()->get(),
            'kategori' => $this->kategoriRepository->getAll()];

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
