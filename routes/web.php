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

//Karyawan
Route::get('/data/karyawan', [KaryawanController::class, 'index']);
Route::get('/tambah/karyawan', [KaryawanController::class, 'create']);
Route::post('/tambah/karyawan', [KaryawanController::class, 'store']);
Route::get('/ubah/karyawan/{id}', [KaryawanController::class, 'edit']);
Route::post('/ubah/karyawan', [KaryawanController::class, 'update']);
Route::post('/hapus/karyawan', [KaryawanController::class, 'destroy']);

//Persediaan
Route::get('/data/persediaan', [PersediaanController::class, 'index']);
Route::get('/tambah/persediaan', [PersediaanController::class, 'create']);
Route::post('/tambah/persediaan', [PersediaanController::class, 'store']);
Route::get('/ubah/persediaan/{id}', [PersediaanController::class, 'edit']);
Route::post('/ubah/persediaan', [PersediaanController::class, 'update']);
Route::post('/hapus/persediaan', [PersediaanController::class, 'destroy']);

Route::get('/data/produksi', [ProduksiController::class, 'index']);

Route::get('/data/pembelian', [PembelianController::class, 'ind']);

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

