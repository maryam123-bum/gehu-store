<?php

use App\Http\Controllers\dataproController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AdminController;
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

Route::get('/login', function () {
    return view('/login/login');
});

Route::post('/login', [AdminController::class, 'cekdata']);

//Dashboard
Route::get('/', [AdminController::class, 'index']);

Route::get('/chart', function() {
    return view('/dashboard/chart');
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

//Pembeliaan
Route::get('/pembelian', [PembelianController::class, 'index']);
Route::get('/tambah/pembelian', [PembelianController::class, 'create']);
Route::get('/barang/pembelian/{id}', [PembelianController::class, 'bacaBarang']);
Route::get('/deskripsi/pembelian/{id}', [PembelianController::class, 'bacaDeskripsi']);
Route::get('/total/pembelian/{id}', [PembelianController::class, 'bacaTotal']);
Route::get('/ubah/pembelian/{id}', [PembelianController::class, 'edit']);

Route::post('tambah/pembelian', [PembelianController::class, 'store']);
Route::post('tambah/barang/pembelian-detail', [PembelianController::class, 'insertBarang']);
Route::post('tambah/deskripsi/pembelian-detail', [PembelianController::class, 'insertDeskripsi']);

//Produksi
Route::get('/produksi', [ProduksiController::class, 'data']);
Route::get('/tambah/produksi', [ProduksiController::class, 'create']);
Route::get('/karyawan/produksi/{id}', [ProduksiController::class, 'bacaKaryawan']);
Route::get('/overhead/produksi/{id}', [ProduksiController::class, 'bacaOverhead']);
Route::post('/tambah/karyawan/produksi', [ProduksiController::class, 'insertKaryawan']);
Route::post('/tambah/overhead/produksi', [ProduksiController::class, 'insertOverhead']);
Route::post('/tambah/produksi', [ProduksiController::class, 'store']);


//Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/tambah/penjualan', [PenjualanController::class, 'create']);
Route::get('/barang/penjualan/{id}', [PenjualanController::class, 'bacaBarang']);
Route::get('/deskripsi/penjualan/{id}', [PenjualanController::class, 'bacaDeskripsi']);
Route::get('/total/penjualan/{id}', [PenjualanController::class, 'bacaTotal']);
Route::get('/ubah/penjualan/{id}', [PenjualanController::class, 'edit']);

Route::post('tambah/penjualan', [PenjualanController::class, 'store']);
Route::post('tambah/barang/penjualan-detail', [PenjualanController::class, 'insertBarang']);
Route::post('tambah/deskripsi/penjualan-detail', [PenjualanController::class, 'insertDeskripsi']);

//laporan
Route::get('/laporan', function () {
    return view('/laporan/view', [
        'active' => "laporan"
    ]);
});

Route::get('/laporan/laporanBarang', function () {
    return view('/laporan/laporanBarang', [
        'active' => "laporan"
    ]);
});

Route::get('/laporan/labaRugi', function () {
    return view('/laporan/labaRugi', [
        'active' => "laporan"
    ]);
});

Route::get('/laporan/lapHpp', function () {
    return view('/laporan/lapHpp', [
        'active' => "laporan"
    ]);
});

Route::get('/chart', function () {
    return view('/laporan/chart1');
});

//user
Route::get('/profil', function () {
    return view('/login/user', [
        'active' => "user"
    ]);
});

Route::get('/access', function () {
    return view('/login/admin', [
        'active' => "admin"
    ]);
});