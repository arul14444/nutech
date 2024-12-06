<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function login()
    {
        return view('Login');
    }

    public function register()
    {
        return view('Registrasi');
    }

    public function daftarProduk()
    {
        return view('DaftarProduk');
    }

    public function tambahProduk()
    {
        return view('TambahProduk');
    }

    public function editProduk()
    {
        return view('EditProduk');
    }

    public function profi()
    {
        return view('Profil');
    }
}
