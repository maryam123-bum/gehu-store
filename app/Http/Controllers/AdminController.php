<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function cekdata(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', $username)->where('password', $password)->first();
        if($data){
            return redirect('/dashboard')->with('success', 'Berhasil Login');
        }else{
            return redirect('/')->with('status', 'Gagal Login');
        }


    }
}
