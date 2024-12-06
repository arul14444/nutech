<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'login']);
Route::get('/registrasi', [ViewController::class, 'register']) ->name('register');
Route::get('/daftar-produk', [ViewController::class, 'daftarProduk']);
Route::get('/tambah-produk', [ViewController::class, 'tambahProduk']);
Route::get('/edit-produk', [ViewController::class, 'editProduk']);
Route::get('/profil', [ViewController::class, 'profil']);



