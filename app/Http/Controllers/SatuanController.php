<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public function create(){
        $id = Satuan::all()->count();
        return view('persediaan/satuan', [
            'active' => 'Persediaan',
            'estimateid' => $id + 1
        ]);
    }
    public function store(Request $request){
        Satuan::create([
            'nama_satuan' => $request->nama_satuan
        ]);
        return redirect('/data/persediaan')->with('success', 'Tambah satuan sukses');
    }
    public function edit($id){
        $data = Satuan::where('id', $id)->first();
        // return view()
    }
    public function update(Request $request){
        Satuan::where('id', $request->id)
            ->update([
                'nama_satuan' => $request->nama_satuan
            ]);
            return redirect('/data/persediaan')->with('success', 'Tambah satuan sukses');
    }
    public function destroy(Request $request)
    {
        Satuan::where('id', $request->id)->delete();
        return redirect('data/persediaan')->with('success', 'Hapus data satuan berhasil');
    }
}
