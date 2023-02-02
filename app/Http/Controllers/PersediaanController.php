<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\JenisPersediaan;
use App\Models\Satuan;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('persediaan/data', [
            'judul' => 'Persediaan',
            'data' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persediaan/tambah', [
            'jenis' => JenisPersediaan::all(),
            'satuan' => Satuan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Persediaan::create([
            'nama_barang' => $request->nama_barang,
            'id_jenis' => $request->jenis_barang,
            'stok' => $request->stok,
            'harga_pokok' => $request->harga_pokok,
            'id_satuan' => $request->satuan,
        ]);

        return redirect('data/persediaan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Persediaan::where('id', $id)->first();
        return view('persediaan/ubah', [
            'data' => $data,
            'jenis' => JenisPersediaan::all(),
            'satuan' => Satuan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Persediaan::where('id', $request->id)
            -> update([
                'nama_barang' => $request->nama_barang,
                'id_jenis' => $request->jenis_barang,
                'stok' => $request->stok,
                'harga_pokok' => $request->harga_pokok,
                'id_satuan' => $request->satuan,
            ]);

        return redirect('data/persediaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Persediaan::where('id', $request->id)->delete();
        return redirect('data/persediaan');
    }
}
