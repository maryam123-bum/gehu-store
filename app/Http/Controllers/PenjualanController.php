<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\PenjualanDetailDeskripsi;
use App\Models\Deskripsi;

class PenjualanController extends Controller
{
    public function index()
    {
        if(session('login') == "true"){
        $data_penjualan = penjualan::all();
        
        return view('penjualan/data', [
            'judul' => "penjualan",
            'data' => $data_penjualan,
            'active' => "penjualan"
        ]);
        }
        return redirect('/login');
    }

    public function create()
    {   
        if(session('login') == "true"){
        $latestid = Penjualan::latest()->first();
        if($latestid){
            $latestid = $latestid->id + 1;
        }else{
            $latestid = 1;
        }
        $deskripsiList = Deskripsi::all();
        return view('penjualan/tambah', [
            'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                ->where('id_jenis', 3)
                ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
                'active' => "penjualan",
                'deskripsilist' => $deskripsiList,
            'estimateid' => $latestid
        ]);
        }
        return redirect('/login');
    }

    public function bacaBarang($id = 0){
        if(session('login') == "true"){
            $baranglist = [];
            if($id != 0){
                $baranglist = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
                ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                ->where('id_penjualan', $id)
                ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'penjualan_detail.jumlah']);
                
            }
            return view('penjualan/barang')->with([
                'data' => $baranglist
            ]);
        }
        return redirect('/login');
    }
    public function bacaDeskripsi($id = 0){
        if(session('login') == "true"){
            $deskripsiList = [];
            if($id != 0){
                $deskripsiList = PenjualanDetailDeskripsi::join('deskripsi', 'penjualan_detail_deskripsi.id_deskripsi', '=', 'deskripsi.id')->where('id_penjualan', $id)
                ->get();
            }
            return view('penjualan/deskripsi')->with([
                'data' => $deskripsiList
            ]);
        }
        return redirect('/login');
    }
    public function bacaTotal($id = 0){
        $total = 0;
        if($id != 0){
            
            $totalBarang = 0;
            $data = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
                ->where('id_penjualan', $id)
                ->get(['persediaan.harga_pokok', 'penjualan_detail.jumlah']);
            if($data){
                foreach($data as $item){
                    $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
                }
            }
            $dataDeskripsi = PenjualanDetailDeskripsi::where('id_penjualan', $id)->get();
            $totalDeskripsi = $dataDeskripsi->sum('biaya');
            $total = $totalBarang + $totalDeskripsi;
        }
        return $total;
    }
    public function insertBarang(Request $request)
    {
        PenjualanDetail::create([
            'id_penjualan' => $request->id_penjualan,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'diskon' => $request->diskon
        ]);
        $total = 0;
            
        $totalBarang = 0;
        $data = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
            ->where('id_penjualan', $request->id_penjualan)
            ->get(['persediaan.harga_pokok', 'penjualan_detail.jumlah']);
        if($data){
            foreach($data as $item){
                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
        }
        $dataDeskripsi = PenjualanDetailDeskripsi::where('id_penjualan', $request->id_penjualan)->get();
        $totalDeskripsi = $dataDeskripsi->sum('biaya');
        $total = $totalBarang + $totalDeskripsi;

        Penjualan::where('id', $request->id_penjualan)->update([
            'total' => $total
        ]);

        return $request->id_penjualan;
    }

    public function insertDeskripsi(Request $request)
    {
        PenjualanDetailDeskripsi::create([
            'id_penjualan' => $request->id_penjualan,
            'id_deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya
        ]);
            
        $totalBarang = 0;
        $data = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
            ->where('id_penjualan', $request->id_penjualan)
            ->get(['persediaan.harga_pokok', 'penjualan_detail.jumlah']);
        if($data){
            foreach($data as $item){
                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
        }
        $dataDeskripsi = PenjualanDetailDeskripsi::where('id_penjualan', $request->id_penjualan)->get();
        $totalDeskripsi = $dataDeskripsi->sum('biaya');
        $total = $totalBarang + $totalDeskripsi;
     
        Penjualan::where('id', $request->id_penjualan)->update([
            'total' => $total
        ]);

        return $request->id_penjualan;
    }

    public function store(Request $request)
    {
        Penjualan::create([
            'tgl_penjualan' => now(),
            'nama_pelanggan' => $request->nama_pelanggan,
            'total' => 0
        ]);
        $id = Penjualan::latest()->first();
        return $id;
    }

    public function edit($id)
    {
        if(session('login') == "true"){
            $header = Penjualan::where('id', $id)->first();
            $baranglist = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
                ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                ->where('id_penjualan', $id)
                ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'penjualan_detail.jumlah']);

            return view('penjualan.edit', [
                'header' => $header,
                'barang' => $baranglist,
                'active' => "penjualan",
                'estimateid' => Penjualan::latest()->first()['id'] + 1
            ]);
        }
        return redirect('/login');
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
