<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Produksi;
use App\Models\Persediaan;
use App\Models\ProduksiBaku;
use App\Models\ProduksiTenaga;
use App\Models\KartonBahanBaku;
use App\Models\ProduksiOverhead;
use App\Models\KertasluarBahanBaku;
use App\Models\KertaskotakBahanBaku;
use App\Models\Deskripsi;

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
        $deskripsi = Deskripsi::all();
        return view('produksi/tambah', [
            'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
            ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
            ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
            'karyawan' => Karyawan::all(),
            'active' => "produksi",
            'deskripsilist' => $deskripsi
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
        ProduksiTenaga::create([
            'id_produksi' => $request->id_produksi,
            'id_karyawan' => $request->id_karyawan,
            'upah' => $request->upah
        ]);
        return $request->id_produksi;
    }


    public function bacaOverhead($id = 0){
        $deskripsiList = [];
        if($id != 0){
            $deskripsiList = ProduksiOverhead::join('deskripsi', 'produksi_overhead.id_deskripsi', '=', 'deskripsi.id')
            ->where('id_produksi', $id)
            ->get();
        }
        return view('produksi/overhead')->with([
            'data' => $deskripsiList
        ]);
    }

    public function insertOverhead(Request $request){
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
            'harga_pokok_produksi' => 0,
            'harga_jual' => 0,
            'id_barang' => $id
        ]);
        //
        $data = ProduksiBaku::create([
            'id_produksi' => $dataproduksi->id,
            'panjang' => 0,
            'lebar' => 0,
            'tinggi' => 0
        ]);
        $idbaku = $data->id;
        if($idbaku){
            KartonBahanBaku::create([
                'id_bahan_baku' => $idbaku,
                'jml_at' => 0,
                'jml_skl' => 0,
                'jml_skd' => 0
            ]);
            KertaskotakBahanBaku::create([
                'id_bahan_baku' => $idbaku,
                'jml_adl' => 0,
                'jml_sd' => 0,
                'jml_sl' => 0
            ]);
            KertasluarBahanBaku::create([
                'id_bahan_baku' => $idbaku,
                'jml_dk' => 0,
                'jml_lk' => 0,
                'jml_sd' => 0,
                'jml_sl' => 0
            ]);
        }
        
        return $dataproduksi->id;
    }

    public function edit($id)
    {
        $header = Produksi::where('id', $id)->first();

        return view('produksi.ubah', [
            'header' => $header,
            // 'barang' => $baranglist,
            'active' => "produksi",
            'estimateid' => Produksi::latest()->first()['id'] + 1
        ]);
    
    }

    public function bacaBahanBaku($id){
        $data_produksibaku = [];
        $data_karton = [];
        $data_kertasluar = [];
        $data_kertaskotak = [];
        $harga_pokok = [
            'karton' => 0,
            'kertas_luar' => 0,
            'kertas_kotak' => 0
        ];

        if ($id != 0) {
            $data_produksibaku = ProduksiBaku::where('id_produksi', $id)->first();
            $id = $data_produksibaku->id;
            $data_karton = KartonBahanBaku::where('id_bahan_baku', $id)->first();
            $data_kertasluar = KertasluarBahanBaku::where('id_bahan_baku', $id)->first();
            $data_kertaskotak = KertaskotakBahanBaku::where('id_bahan_baku', $id)->first();
            $harga_pokok = [
                'karton' => 1000,
                'kertas_luar' => 2000,
                'kertas_kotak' => 3000
            ];
        }

        return view('produksi/bahanbaku',[
            'produksibaku' => $data_produksibaku,
            'karton' => $data_karton,
            'kertasluar' => $data_kertasluar,
            'kertaskotak' => $data_kertaskotak,
            'hargapokok' => $harga_pokok
        ]);
        
    }

    public function updateProduksiBaku(Request $request)
    {
        ProduksiBaku::where('id_produksi', $request->id_produksi)
            ->update([
                'id_produksi' => $request->id_produksi,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'tinggi' => $request->tinggi
            ]);
        $data = ProduksiBaku::latest()->first();
        return $data->id;
    }

    public function updateBahanBaku(Request $request)
    {   

        KartonBahanBaku::where('id_bahan_baku', $request->id_produksi)
            ->update([
                'jml_at' => $request->karton_at,
                'jml_skl' => $request->karton_skl,
                'jml_skd' => $request->karton_skd
            ]);
        KertaskotakBahanBaku::where('id_bahan_baku', $request->id_produksi)
            ->update([
                'jml_adl' => $request->kertaskotak_adl,
                'jml_sd' => $request->kertaskotak_sd,
                'jml_sl' => $request->kertaskotak_sl
            ]);
        KertasluarBahanBaku::where('id_bahan_baku', $request->id_produksi)
            ->update([
                'jml_dk' => $request->kertasluar_dk,
                'jml_lk' => $request->kertasluar_lk,
                'jml_sd' => $request->kertasluar_sd,
                'jml_sl' => $request->kertasluar_sl
            ]);
        return $request->id_produksi;
    }

}
