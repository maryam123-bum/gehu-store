<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPersediaan;

class JenisPersediaanController extends Controller
{
    public function create(){
        $data = JenisPersediaan::all();
        $id = JenisPersediaan::all()->count();
        return view('persediaan/jenis', [
            'active' => 'Persediaan',
            'estimateid' => $id + 1,
            'data' => $data,
        ]);
    }
    public function store(Request $request){
        JenisPersediaan::create([
            'nama_jenis' => $request->nama_jenis
        ]);
        return redirect('/tambah/jenis')->with('success', 'Tambah jenis sukses');
    }
    public function edit($id){
        $data = JenisPersediaan::where('id', $id)->first();
        // return view()
    }
    public function update(Request $request){
        JenisPersediaan::where('id', $request->id)
            ->update([
                'nama_jenis' => $request->nama_jenis
            ]);
            return redirect('/data/persediaan')->with('success', 'Tambah jenis sukses');
        
    }
    public function destroy(Request $request)
    {
        JenisPersediaan::where('id', $request->id)->delete();
        return redirect('data/persediaan')->with('success', 'Hapus data jenis berhasil');
    }
}
