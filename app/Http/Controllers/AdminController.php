<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Karyawan;
use App\Models\Produksi;
use App\Models\Penjualan;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //mengambil data pada dashboard
    public function index(Request $request){
        // if(Auth::check()){
        // return session()->all();
        if(session('login') == "true"){
            //ngambil data dari DB
            $data = [
                'karyawan' => Karyawan::all()->count(),
                'produksi' => Produksi::all()->count(),
                'penjualan' => Penjualan::all()->count(),
                'pembelian' => Pembelian::all()->count()
            ];

            //menampilkan total data perjualan perbulan
            $totalPenjualan = [
                'jan' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-01-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-01-31')))->get()->sum('total'),
                'feb' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-02-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-02-30')))->get()->sum('total'),
                'mar' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-03-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-03-31')))->get()->sum('total'),
                'apr' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-04-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-04-30')))->get()->sum('total'),
                'mei' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-05-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-05-31')))->get()->sum('total'),
                'jun' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-06-30')))->get()->sum('total'),
                'jul' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-07-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-07-31')))->get()->sum('total'),
                'aug' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-08-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-08-31')))->get()->sum('total'),
                'sep' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-09-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-09-30')))->get()->sum('total'),
                'oct' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-10-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-10-31')))->get()->sum('total'),
                'nov' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-11-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-11-30')))->get()->sum('total'),
                'dec' => Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-12-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-12-31')))->get()->sum('total'),
            ];

            //menampilkan total data pembelian perbulan
            $totalPembelian = [
                'jan' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-01-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-01-31')))->get()->sum('total'),
                'feb' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-02-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-02-30')))->get()->sum('total'),
                'mar' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-03-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-03-31')))->get()->sum('total'),
                'apr' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-04-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-04-30')))->get()->sum('total'),
                'mei' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-05-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-05-31')))->get()->sum('total'),
                'jun' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-06-30')))->get()->sum('total'),
                'jul' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-07-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-07-31')))->get()->sum('total'),
                'aug' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-08-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-08-31')))->get()->sum('total'),
                'sep' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-09-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-09-30')))->get()->sum('total'),
                'oct' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-10-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-10-31')))->get()->sum('total'),
                'nov' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-11-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-11-30')))->get()->sum('total'),
                'dec' => Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-12-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-12-31')))->get()->sum('total'),
            ];

            //menampilkan pada halaman dashboard
            return view('dashboard/dashboard', [
                'active' =>'dashboard',
                'data' => $data,
                'totalPenjualan' => $totalPenjualan,
                'totalPembelian' => $totalPembelian,
            ]);
        }
        //mengembalikan pada halaman login
        return redirect('login');
    }

    //cek data login
    public function cekdata(Request $request) {
        $username = $request->username;
        $password = $request->password;
        $data = Admin::where('username', $username)->where('password', $password)->first();
        $karyawan = Admin::join('karyawan', 'admin.id_karyawan', '=', 'karyawan.id')
            ->where('admin.username', $username)
            ->first();

        //memeriksa data login
        if($data){
            $request->session()->put('login', "true");
            $request->session()->put('nama', $karyawan->nama);
            $request->session()->put('jabatan',$karyawan->jabatan);
            return redirect('/')->with('success', 'Berhasil Login');
        }else{
            return redirect('/login')->with('status', 'Gagal Login');
        }
    }

    //keluar aplikasi
    public function logout(Request $request){
        $request->session()->put('login','false');
        return redirect('/login');
    }

    //menampilkan data akses pada menu data akses
    public function data(){
        $admin = Admin::join('karyawan', 'admin.id_karyawan', '=', 'karyawan.id')->get([
            'admin.id', 'admin.username', 'karyawan.nama', 'karyawan.jabatan'
        ]);
        return view('/login/access/data', [
            'data' => $admin,
            'active' => "data-tambahan"
        ]);
    }

    //menambah data akses
    public function create()
    {   
        $karyawan = Karyawan::all();

        //menampilkan halaman tambah access
        return view('/login/access/tambah',[
            'karyawan'=> $karyawan,
            'active' => "data-tambahan"
        ]);
    }

    //menyimpan data admin
    public function store(Request $request)
    {
        //database admin membuat data baru
        Admin::create([
            'username' => $request->username,
            'password' => $request->password,
            'id_karyawan' => $request->id_karyawan
        ]);
        //menampilkan data access
        return redirect('/data/access')->with('success', 'Tambah Admin Behasil');
    }

    //mengubah data admin
    public function edit($id)
    {    
        
        $karyawan = Karyawan::all();
        $admin = Admin::where('admin.id', $id)->first();

        return view('/login/access/ubah',[
            'karyawan'=> $karyawan,
            'admin' => $admin,
            'active' => "data-tambahan"
        ]);
    }
    
    //memperbarui data baru yang telah diubah pada databasse
    public function update(Request $request)
    {
        Admin::where('id',$request->id)
        ->update([
            'username' => $request->username,
            'password' => $request->password,
            'id_karyawan' => $request->id_karyawan
        ]);
        return redirect('/data/access')->with('success', 'Tambah Admin Behasil');
    }

    //menghapus data admin
    public function destroy(Request $request)
    {
        Admin::where('id', $request->id)->delete();
        return redirect('/data/access')->with('success', 'Hapus data berhasil');
    }
}
