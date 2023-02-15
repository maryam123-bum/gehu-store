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
            return view('dashboard/dashboard', [
                'active' =>'dashboard',
                'data' => $data
            ]);
        // }
        // return redirect('/login');
    }
    public function cekdata(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Admin::where('username', $username)->where('password', $password)->first();

        // if (Auth::attempt(['username' => $data->username, 'password' => $request->password])) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('/')->with('success', 'Berhasil Login' );
        // }
        if($data){
            // $user = Admin::where('username', $username)->first();
            // Auth::login($user, true);
            return redirect('/')->with('success', 'Berhasil Login');
        }else{
            return redirect('/login')->with('status', 'Gagal Login');
        }


    }
}
