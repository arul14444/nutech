<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'login']);
Route::get('/registrasi/view', [ViewController::class, 'registerView']) ->name('register');

Route::get('/daftar-produk', [ViewController::class, 'daftarProduk']) ->name('daftar-produk');
Route::get('/tambah-produk', [ViewController::class, 'tambahProduk']) ->name('tambah-produk');
Route::get('/edit-produk/{uuid}', [ViewController::class, 'editProduk']);
Route::get('/profil', [ViewController::class, 'profil']) ->name('profil');

Route::post('/registrasi', [AuthController::class, 'register']) ->name('submit.register');

Route::post('/store-produk', [ProdukController::class, 'store']) ->name('store.produk');
Route::delete('/delete-produk/{uuid}', [ProdukController::class, 'delete']);
Route::put('/update-produk/{uuid}', [ProdukController::class, 'update']) ->name('update.produk');


 