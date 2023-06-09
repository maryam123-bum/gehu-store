<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPersediaan;

class JenisPersediaanController extends Controller
{
    public $access;

    public function __construct()
    {
        $this->access = "Karyawan Administrasi" || "Direktur";
    }

    //membuat data baru
    public function create(){
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $data = JenisPersediaan::all();
                $id = JenisPersediaan::all()->count();
                return view('persediaan/jenis', [
                    'active' => 'persediaan',
                    'estimateid' => $id + 1,
                    'data' => $data,
                ]);
            } else{
                return redirect('/');
            }
            
        }
        return redirect('/login');
    }

    //menyimpan pada DB
    public function store(Request $request){
        JenisPersediaan::create([
            'nama_jenis' => $request->nama_jenis
        ]);
        return redirect('/tambah/jenis')->with('success', 'Tambah jenis sukses');
    }

    //mengubah data
    public function edit($id){
        $data = JenisPersediaan::where('id', $id)->first();
        // return view()
    }

    //menyimpan perubahan data pada DB
    public function update(Request $request){
        JenisPersediaan::where('id', $request->id)
            ->update([
                'nama_jenis' => $request->nama_jenis
            ]);
            return redirect('/data/persediaan')->with('success', 'Tambah jenis sukses');
        
    }

    //menghapus data
    public function destroy(Request $request)
    {
        JenisPersediaan::where('id', $request->id)->delete();
        return redirect('data/persediaan')->with('success', 'Hapus data jenis berhasil');
    }
}
