<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deskripsi;

class DeskripsiController extends Controller
{
    public function create(){
        if(session('login') == "true"){
            $id = Deskripsi::all()->count();
            return view('persediaan/deskripsi', [
                'active' => 'Persediaan',
                'estimateid' => $id + 1
            ]);
        }
        return redirect('/login');
    }
    public function store(Request $request){
        Deskripsi::create([
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/data/persediaan')->with('success', 'Tambah deskripsi sukses');
    }
    public function edit($id){
        $data = Deskripsi::where('id', $id)->first();
        // return view()
    }
    public function update(Request $request){
        Deskripsi::where('id', $request->id)
            ->update([
                'deskripsi' => $request->deskripsi
            ]);
        return redirect('/data/persediaan')->with('success', 'Tambah deskripsi sukses');
        
    }
    public function destroy(Request $request)
    {
        Deskripsi::where('id', $request->id)->delete();
        return redirect('data/persediaan')->with('success', 'Hapus data deskripsi berhasil');
    }
}
