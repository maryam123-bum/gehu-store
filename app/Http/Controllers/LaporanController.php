<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view('/laporan/view', [
            'active' => "laporan"
        ]);
    }

    public function lapBarang(){
        return view('/laporan/laporanBarang', [
            'active' => "laporan"
        ]);
    }

    public function labaRugi(){
        return view('/laporan/labaRugi', [
            'active' => "laporan"
        ]);
    }
    public function lapHpp(){
        return view('/laporan/lapHpp', [
            'active' => "laporan"
        ]);
    }
}
