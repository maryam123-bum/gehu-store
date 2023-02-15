<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\PembelianDetailDeskripsi;

class PembelianController extends Controller
{
    public function index()
    {
        $data_pembelian = Pembelian::all();
        
        return view('pembelian/data', [
            'judul' => "Pembelian",
            'data' => $data_pembelian,
            'active' => "pembelian"
        ]);
    }

    public function create()
    {   
        return view('pembelian/tambah', [
            'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
                'active' => "pembelian",
            'estimateid' => Pembelian::latest()->first()['id'] + 1
        ]);
    }

    public function bacaBarang($id = 0){
        $baranglist = [];
        if($id != 0){
            $baranglist = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
            ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->where('id_pembelian', $id)
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'pembelian_detail.jumlah']);
            
        }
        return view('pembelian/barang')->with([
            'data' => $baranglist
        ]);
    }
    public function bacaDeskripsi($id = 0){
        $deskripsiList = [];
        if($id != 0){
            $deskripsiList = PembelianDetailDeskripsi::where('id_pembelian', $id)
            ->get();
        }
        return view('pembelian/deskripsi')->with([
            'data' => $deskripsiList
        ]);
    }
    public function bacaTotal($id = 0){
        $total = 0;
        if($id != 0){
            $totalBarang = 0;
            $data = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
                ->where('id_pembelian', $id)
                ->get(['persediaan.harga_pokok', 'pembelian_detail.jumlah']);
            foreach($data as $item){

                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
            $dataDeskripsi = PembelianDetailDeskripsi::where('id_pembelian', $id)->get();
            $totalDeskripsi = $dataDeskripsi->sum('biaya');
            $total = $totalBarang + $totalDeskripsi;
        }
        return $total;
    }
    public function insertBarang(Request $request)
    {
        PembelianDetail::create([
            'id_pembelian' => $request->id_pembelian,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        return $request->id_pembelian;
    }
    public function insertDeskripsi(Request $request)
    {
        PembelianDetailDeskripsi::create([
            'id_pembelian' => $request->id_pembelian,
            'deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya
        ]);
        return $request->id_pembelian;
    }
    public function store(Request $request)
    {
        Pembelian::create([
            'tgl_pembelian' => now(),
            'nama_pemasok' => $request->nama_pemasok,
            'total' => 0
        ]);
        $id = Pembelian::latest()->first();
        return $id;
    }

    public function edit($id)
    {
        $header = Pembelian::where('id', $id)->first();
        $baranglist = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
            ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->where('id_pembelian', $id)
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'pembelian_detail.jumlah']);

        return view('pembelian.ubah', [
            'header' => $header,
            'barang' => $baranglist,
            'active' => "pembelian"
        ]);
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
