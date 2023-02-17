<?php

use App\Http\Controllers\dataproController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisPersediaanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\DeskripsiController;
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

    if (session('login') == "false"){
        return view('/login/login');
    }
    return redirect('/')->with('success', 'Anda Sudah Login');
});

Route::post('/login', [AdminController::class, 'cekdata']);
Route::post('/logout', [AdminController::class, 'logout']);

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

//Jenis
Route::get('/tambah/jenis', [JenisPersediaanController::class, 'create']);
Route::post('/tambah/jenis', [JenisPersediaanController::class, 'store']);

//Satuan
Route::get('/tambah/satuan', [SatuanController::class, 'create']);
Route::post('/tambah/satuan', [SatuanController::class, 'store']);

//Deskripsi
Route::get('/tambah/deskripsi', [DeskripsiController::class, 'create']);
Route::post('/tambah/deskripsi', [DeskripsiController::class, 'store']);

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
Route::get('/bahanbaku/produksi/{id}', [ProduksiController::class, 'bacaBahanBaku']);
Route::post('/tambah/karyawan/produksi', [ProduksiController::class, 'insertKaryawan']);
Route::post('/tambah/overhead/produksi', [ProduksiController::class, 'insertOverhead']);
Route::post('/tambah/produksi', [ProduksiController::class, 'store']);

Route::post('/update/bahanbaku/produksi', [ProduksiController::class, 'updateProduksiBaku']);
Route::post('/update/bahanbakudetail/produksi', [ProduksiController::class, 'updateBahanBaku']);

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

// Route::get('/chart', function () {
//     return view('/laporan/chart1');
// });

//user
Route::get('/profil', function () {
    return view('/login/user', [
        'active' => "user"
    ]);
});

//Admin
Route::get('/data/access', [AdminController::class, 'data']);
Route::get('/tambah/access', [AdminController::class, 'create']);
Route::get('/ubah/access/{id}', [AdminController::class, 'edit']);
Route::post('/tambah/access', [AdminController::class, 'store']);
Route::post('/ubah/access', [AdminController::class, 'update']);
Route::post('/hapus/access', [AdminController::class, 'destroy']);