<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data_penjualan = Penjualan::all();
        
        return view('penjualan/data', [
            'judul' => "Penjualan",
            'data' => $data_penjualan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan/tambah', [
            'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis'])
        ]);
    }

    public function read($id = 0){
        $baranglist = [];
        if($id != 0){
            $baranglist = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
            ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->where('id_penjualan', $id)
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'penjualan_detail.jumlah']);
        }
        return view('penjualan/read')->with([
            'data' => $baranglist
        ]);
    }

    public function insert(Request $request)
    {
        PenjualanDetail::create([
            'id_penjualan' => $request->id_penjualan,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        return $request->id_penjualan;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Penjualan::where('id', $id)->first();
        $baranglist = PenjualanDetail::join('persediaan', 'penjualan_detail.id_barang', '=', 'persediaan.id')
            ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->where('id_penjualan', $id)
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'penjualan_detail.jumlah']);

        return view('penjualan.edit', [
            'header' => $header,
            'barang' => $baranglist
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
