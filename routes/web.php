<?php

use App\Http\Controllers\dataproController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::get('/dashboard', function() {
    return "Dashboard";
});

//Manajemen Data
Route::get('/data/karyawan', [KaryawanController::class, 'index']);

Route::get('/data/produksi', [ProduksiController::class, 'data']);

Route::get('/data/persediaan', [PersediaanController::class, 'data']);

Route::get('/data/pembelian', [PembelianController::class, 'data']);

Route::get('/data/penjualan', [PenjualanController::class, 'data']);

//Manajemen Produksi
Route::get('/produksi/produksi-barang', function() {
    return "Produksi Barang";
});

Route::get('/produksi/harga-jual', function() {
    return "Harga Jual";
});

Route::get('/pembelian', function() {
    return "Manajemen Permbelian";
});

Route::get('/pembelian/pembelian-produk', function() {
    return "Permbelian Produk";
});

Route::get('/penjualan', function() {
    return "Manajemen Penjualan";
});

Route::get('/penjualan/penjualan-produk', function() {
    return "Penjualan Produk";
});

