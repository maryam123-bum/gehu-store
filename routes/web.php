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
use App\Http\Controllers\LaporanController;
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

//meminta login
Route::get('/login', function () {

        return view('/login/login');
});
Route::get('/chart', function() {
    return view('/dashboard/chart');
});

//ubah seperti ini
Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/login', 'cekdata');
    Route::post('/logout', 'logout');
});

//Karyawan
Route::controller(KaryawanController::class)->group(function () {
    Route::get('/karyawan', 'index');
    Route::get('/tambah/karyawan', 'create');
    Route::get('/ubah/karyawan/{id}', 'edit');

    Route::post('/tambah/karyawan', 'store');
    Route::post('/ubah/karyawan', 'update');
    Route::post('/hapus/karyawan', 'destroy');
    Route::post('/tambah/namajabatan', 'simpanjbt');
});

//Persediaan
Route::controller(PersediaanController::class)->group(function () {
    Route::get('/persediaan', 'index');
    Route::get('/tambah/persediaan', 'create');
    Route::get('/ubah/persediaan/{id}', 'edit');

    Route::post('/tambah/persediaan', 'store');
    Route::post('/ubah/persediaan', 'update');
    Route::post('/hapus/persediaan', 'destroy');
});

//Jenis
Route::controller(JenisPersediaanController::class)->group(function () {
    Route::get('/tambah/jenis', 'create');
    Route::post('/tambah/jenis', 'store');
});

//Satuan
Route::controller(SatuanController::class)->group(function () {
    Route::get('/tambah/satuan', 'create');
    Route::post('/tambah/satuan', 'store');
});

//Deskripsi
Route::controller(DeskripsiController::class)->group(function () {
    Route::get('/tambah/deskripsi', 'create');
    Route::post('/tambah/deskripsi', 'store');
});

//Pembeliaan
Route::controller(PembelianController::class)->group(function () {
    Route::get('/pembelian', 'index');
    Route::get('/tambah/pembelian', 'create');
    Route::get('/barang/pembelian/{id}', 'bacaBarang');
    Route::get('/deskripsi/pembelian/{id}', 'bacaDeskripsi');
    Route::get('/total/pembelian/{id}', 'bacaTotal');
    Route::get('/ubah/pembelian/{id}', 'edit');

    Route::post('/tambah/pembelian', 'store');
    Route::post('/tambah/barang/pembelian-detail', 'insertBarang');
    Route::post('/tambah/deskripsi/pembelian-detail', 'insertDeskripsi');
});

//Produksi
Route::controller(ProduksiController::class)->group(function () {
    Route::get('/produksi', 'data');
    Route::get('/tambah/produksi', 'create');
    Route::get('/karyawan/produksi/{id}', 'bacaKaryawan');
    Route::get('/overhead/produksi/{id}', 'bacaOverhead');
    Route::get('/ubah/produksi/{id}', 'edit');
    Route::get('/bahanbaku/produksi/{id}', 'bacaBahanBaku');
    Route::get('/produksi/hargaJual', function () {
        return view('produksi/hargaJual', [
            'active' => "produksi"
        ]);
    });


    Route::post('/tambah/karyawan/produksi', 'insertKaryawan');
    Route::post('/tambah/overhead/produksi', 'insertOverhead');
    Route::post('/tambah/produksi', 'store');
    Route::post('/update/bahanbaku/produksi', 'updateProduksiBaku');
    Route::post('/update/bahanbakudetail/produksi', 'updateBahanBaku');
    Route::post('/update/hargajual/produksi', 'updateHargaJual');
});

//Penjualan
Route::controller(PenjualanController::class)->group(function () {
    Route::get('/penjualan', 'index');
    Route::get('/tambah/penjualan', 'create');
    Route::get('/barang/penjualan/{id}', 'bacaBarang');
    Route::get('/deskripsi/penjualan/{id}', 'bacaDeskripsi');
    Route::get('/total/penjualan/{id}', 'bacaTotal');
    Route::get('/ubah/penjualan/{id}', 'edit');

    Route::post('/tambah/penjualan', 'store');
    Route::post('/tambah/barang/penjualan-detail', 'insertBarang');
    Route::post('/tambah/deskripsi/penjualan-detail', 'insertDeskripsi');
});

Route::controller(LaporanController::class)->group(function(){
    Route::get('/laporan', 'index');
    Route::get('/laporan/laporanBarang', 'lapBarang');
    Route::get('/laporan/labaRugi', 'labaRugi');
    Route::get('/laporan/lapHpp', 'lapHpp');
});

//user
Route::get('/profil', function () {
    return view('/login/user', [
        'active' => "user"
    ]);
});

//Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/data/access', 'data');
    Route::get('/tambah/access', 'create');
    Route::get('/ubah/access/{id}', 'edit');

    Route::post('/tambah/access', 'store');
    Route::post('/ubah/access', 'update');
    Route::post('/hapus/access', 'destroy');
});