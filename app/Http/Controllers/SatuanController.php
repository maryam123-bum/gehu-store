<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public $access;

    public function __construct()
    {
        $this->access = "Karyawan Administrasi" || "Direktur";
    }

    public function create(){
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $data = Satuan::all();
                $id = Satuan::all()->count();
                return view('persediaan/satuan', [
                    'data' => $data,
                    'active' => 'Persediaan',
                    'estimateid' => $id + 1
                ]);
            } else{
                return redirect('/');
            }
        
        }
        return redirect('/login');
    }
    public function store(Request $request){
        Satuan::create([
            'nama_satuan' => $request->nama_satuan
        ]);
        return redirect('/tambah/satuan')->with('success', 'Tambah satuan sukses');
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
            return redirect('/tambah/satuan')->with('success', 'Tambah satuan sukses');
    }
    public function destroy(Request $request)
    {
        Satuan::where('id', $request->id)->delete();
        return redirect('tambah/satuan')->with('success', 'Hapus data satuan berhasil');
    }
}
