<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'login']);
Route::get('/registrasi/view', [ViewController::class, 'registerView']) ->name('register');

Route::post('/registrasi', [AuthController::class, 'register']) ->name('submit.register');
Route::get('/daftar-produk', [ViewController::class, 'daftarProduk']) ->name('daftar-produk');
Route::get('/tambah-produk', [ViewController::class, 'tambahProduk']) ->name('tambah-produk');
Route::get('/edit-produk', [ViewController::class, 'editProduk']) ->name('edit-produk');
Route::get('/profil', [ViewController::class, 'profil']) ->name('profil');



