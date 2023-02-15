<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;
use App\Models\Karyawan;
use App\Models\Persediaan;
use App\Models\ProduksiBaku;
use App\Models\ProduksiTenaga;
use App\Models\ProduksiOverhead;

class ProduksiController extends Controller
{
    public function data()
    {
        $data_produksi = Produksi::all();
        
        return view('produksi/data', [
            'judul' => "Produksi",
            'data' => $data_produksi,
            'active' => "produksi"
        ]);
    }

    public function create()
    {
        return view('produksi/tambah', [
            'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
            'karyawan' => Karyawan::all(),
            'active' => "produksi"
        ]);
    }

    public function bacaKaryawan($id){
        $karyawanlist = [];
        if ($id != 0) {
            $karyawanlist = ProduksiTenaga::join('karyawan', 'produksi_tenaga_kerja.id_karyawan', '=', 'karyawan.id')
                ->where('id_produksi',$id)
                ->get(['karyawan.nama', 'produksi_tenaga_kerja.*']);
        }
        return view('produksi/tenagakerja')->with([
            'data' => $karyawanlist
        ]);
    }

    public function insertKaryawan(Request $request){
        return 
        ProduksiTenaga::create([
            'id_produksi' => $request->id_produksi,
            'id_karyawan' => $request->id_karyawan,
            'upah' => $request->upah
        ]);
        return $request->id_produksi;
    }

    public function bacaOverhead($id){
        $overheadlist = [];
        if ($id != 0) {
            $overheadlist = ProduksiOverhead::where('id_produksi', $id)->get();
        }
        return view('produksi/overhead')->with([
            'data' => $overheadlist
        ]);
    }

    public function insertOverhead(Request $request){
        return 
        ProduksiOverhead::create([
            'id_produksi' => $request->id_produksi,
            'deskripsi' => $request->ov_deskripsi,
            'biaya' => $request->ov_biaya
        ]);
        return $request->id_produksi;
    }

    public function store(Request $request)
    {   
        // return $request->nama_barang_produksi;
        $datapersediaan = Persediaan::create([
            'nama_barang' => $request->nama_barang_produksi,
            'id_jenis' => 3,
            'stok' => 0,
            'harga_pokok' => 0,
            'id_satuan' => 4
        ]);
        $id = $datapersediaan->id;
        $dataproduksi = Produksi::create([
            'tgl_produksi' => now(),
            'biaya_bahan_baku' => 0,
            'biaya_overhead' => 0,
            'biaya_tenaga_kerja' => 0,
            'harga_jual' => 0,
            'id_barang' => $id
        ]);
        return $dataproduksi->id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
