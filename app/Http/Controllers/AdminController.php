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
    public function index(){
        // if(Auth::check()){

        $data = [
            'karyawan' => Karyawan::all()->count(),
            'produksi' => Produksi::all()->count(),
            'penjualan' => Penjualan::all()->count(),
            'pembelian' => Pembelian::all()->count()
        ];

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

        return view('dashboard/dashboard', [
            'active' =>'dashboard',
            'data' => $data,
            'totalPenjualan' => $totalPenjualan,
            'totalPembelian' => $totalPembelian
        ]);
    }

    public function cekdata(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Admin::where('username', $username)->where('password', $password)->first();

        if($data){
            return redirect('/')->with('success', 'Berhasil Login');
        }else{
            return redirect('/login')->with('status', 'Gagal Login');
        }
    }

    public function data(){
        $admin = Admin::join('karyawan', 'admin.id_karyawan', '=', 'karyawan.id')->get();
        return view('/login/access/data', [
            'data' => $admin,
            'active' => "data-tambahan"
        ]);
    }

    public function create()
    {   
        $karyawan = Karyawan::all();

        return view('/login/access/tambah',[
            'karyawan'=> $karyawan,
            'active' => "data-tambahan"
        ]);
    }
    public function store(Request $request)
    {
        Admin::create([
            'username' => $request->username,
            'password' => $request->password,
            'id_karyawan' => $request->id_karyawan
        ]);
        return redirect('/data/access')->with('success', 'Tambah Admin Behasil');
    }
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
    public function destroy(Request $request)
    {
        Admin::where('id', $request->id)->destroy();
        return redirect('/data/access')->with('success', 'Hapus data berhasil');
    }
}
