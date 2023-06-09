<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\JenisPersediaan;
use App\Models\Satuan;

class PersediaanController extends Controller
{
    public $access;

    public function __construct()
    {
        $this->access = "Karyawan Administrasi" || "Direktur";
    }

     //menampilkan data
    public function index()
    { 
        if(session('login') == "true"){
            return view('persediaan/data', [
                'judul' => 'Persediaan',
                'access' => $this->access,
                'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                    ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                    ->where('persediaan.id_jenis', '!=', '3')
                    ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
                'barangjadi' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                    ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                    ->where('persediaan.id_jenis', '3')
                    ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis'])
                    ->sortDesc(),
                'active' => "persediaan"
            ]);
        }
        return redirect('/login');
    }

     //menambah data baru
    public function create()
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                return view('persediaan/tambah', [
                    'jenis' => JenisPersediaan::all(),
                    'satuan' => Satuan::all(),
                    'active' => "persediaan"
                ]);
            } else{
                return redirect('/');
            }
            
        }
        return redirect('/login');
    }

     //menyimpan data pada DB
    public function store(Request $request)
    {
        Persediaan::create([
            'nama_barang' => $request->nama_barang,
            'id_jenis' => $request->jenis_barang,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'id_satuan' => $request->satuan,
        ]);

        return redirect('/persediaan')->with('success', 'tambah data persediaan sukses');;
    }

     //mengubah data
    public function edit($id)
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $data = Persediaan::where('id', $id)->first();
                return view('persediaan/ubah', [
                    'data' => $data,
                    'jenis' => JenisPersediaan::all(),
                    'satuan' => Satuan::all(),
                    'active' => "persediaan"
                ]);
            } else{
                return redirect('/');
            }
        }
        return redirect('/login');
    }

     //menyimpan perubahan pada DB
    public function update(Request $request)
    {
        $data = Persediaan::where('id', $request->id)->first();
        $stok_sekarang = $data->stok;

        Persediaan::where('id', $request->id)
            -> update([
                'nama_barang' => $request->nama_barang,
                'id_jenis' => $request->jenis_barang,
                'stok' => $stok_sekarang,
                'harga_pokok' => $request->harga_pokok,
                'id_satuan' => $request->satuan,
            ]);

        return redirect('/persediaan')->with('success', 'ubah data persediaan sukses');
    }

     //menghapus data
    public function destroy(Request $request)
    {
        Persediaan::where('id', $request->id)->delete();
        return redirect('/persediaan')->with('success', 'hapus data persediaan sukses');;
    }
}
