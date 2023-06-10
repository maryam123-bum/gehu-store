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
    public $access;

    public function __construct()
    {
        $this->access = "Karyawan Produksi" || "Direktur";
    }

    //menampilkan data
    public function data()
    {
        if(session('login') == "true"){
        $data_produksi = Produksi::join('persediaan', 'produksi.id_barang', '=', 'persediaan.id')->get(['produksi.*','persediaan.nama_barang']);
        
        return view('produksi/data', [
            'judul' => "Produksi",
            'access' => $this->access,
            'data' => $data_produksi,
            'active' => "produksi"
        ]);
        }
        return redirect('/login');
    }

    //membuat data
    public function create()
    {   
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $deskripsi = Deskripsi::all();
                $latestid = Produksi::latest()->first();
                    if($latestid){
                        $latestid = $latestid->id + 1;
                    }else{
                        $latestid = 1;
                    }
                return view('produksi/tambah', [
                    'karyawan' => Karyawan::all(),
                    'active' => "produksi",
                    'deskripsilist' => $deskripsi,
                    'estimateid' => $latestid
                ]);
            } else {
                return redirect('/');
            }
        
        }
        return redirect('/login');
    }

    //menampilkan data karyawan pada form
    public function bacaKaryawan($id){
        if(session('login') == "true"){
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
        return redirect('/login');
    }

    //menambah data karyawan pada form
    public function insertKaryawan(Request $request){
        
        ProduksiTenaga::create([
            'id_produksi' => $request->id_produksi,
            'id_karyawan' => $request->id_karyawan,
            'upah' => $request->upah
        ]);

        //Produksi
        $data = ProduksiBaku::where('id_produksi', $request->id_produksi)->first();
        $p = $data->panjang;
        $l = $data->lebar;
        $t = $data->tinggi;
        //data 
        $karton = KartonBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertasluar = KertasluarBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertaskotak = KertaskotakBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        //karton
        $k_at = $karton->jml_at;
        $k_skl = $karton->jml_skl;
        $k_skd = $karton->jml_skd;
        //kertasluar
        $kl_dk = $kertasluar->jml_dk;
        $kl_lk = $kertasluar->jml_lk;
        $kl_sd = $kertasluar->jml_sd;
        $kl_sl = $kertasluar->jml_sl;
        //kertaskotak
        $kk_adl = $kertaskotak->jml_adl;
        $kk_sd = $kertaskotak->jml_sd;
        $kk_sl = $kertaskotak->jml_sl;

        //harga
        $hrgkarton = Persediaan::where('nama_barang', "Karton")->first()->harga_pokok;
        $hrgkertasluar = Persediaan::where('nama_barang', "Kertas Luar")->first()->harga_pokok;
        $hrgkertaskotak = Persediaan::where('nama_barang', "Kertas Dalam")->first()->harga_pokok;

        $hpp1 = $p*$l*$k_at*$hrgkarton;
        $hpp2 = $p*$t*$k_skl*$hrgkarton;
        $hpp3 = $p*$t*$k_skd*$hrgkarton;
        $hpp4 = $p*$l*$kl_dk*$hrgkertasluar;
        $hpp5 = $p*$l*$kl_lk*$hrgkertasluar;
        $hpp6 = $p*$t*$kl_sd*$hrgkertasluar;
        $hpp7 = $p*$t*$kl_sl*$hrgkertasluar;
        $hpp8 = $p*$l*$kk_adl*$hrgkertaskotak;
        $hpp9 = $p*$t*$kk_sd*$hrgkertaskotak;
        $hpp10 = $l*$t*$kk_sl*$hrgkertaskotak;
        
        $hpptotal = $hpp1 + $hpp2 + $hpp3 + $hpp4 + $hpp5 + $hpp6 + $hpp7 + $hpp8 + $hpp9 + $hpp10;

        //update total
        $ov = ProduksiOverhead::where('id_produksi', $request->id_produksi)->get()->sum('biaya');
        $tk = ProduksiTenaga::where('id_produksi', $request->id_produksi)->get()->sum('upah');
        $bbb = $hpptotal;
        
        $hpp = $ov + $tk + $bbb;
        Produksi::where('id', $request->id_produksi)
        ->update([
            'harga_pokok_produksi' => $hpp,
            'harga_jual' => $hpp
        ]);
        $idbarang = Produksi::where('id', $request->id_produksi)->first()->id_barang;
        Persediaan::where('id', $idbarang)->update([
            'harga_pokok' => $hpp
        ]);
        //end update
        return $request->id_produksi;
    }


    //menampilkan data overhead pada form
    public function bacaOverhead($id = 0){
        if(session('login') == "true"){
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
        return redirect('/login');
    }

    //menambah pada form
    public function insertOverhead(Request $request){
        ProduksiOverhead::create([
            'id_produksi' => $request->id_produksi,
            'id_deskripsi' => $request->ov_deskripsi,
            'biaya' => $request->ov_biaya
        ]);
        
        //Produksi
        $data = ProduksiBaku::where('id_produksi', $request->id_produksi)->first();
        $p = $data->panjang;
        $l = $data->lebar;
        $t = $data->tinggi;
        //data 
        $karton = KartonBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertasluar = KertasluarBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertaskotak = KertaskotakBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        //karton
        $k_at = $karton->jml_at;
        $k_skl = $karton->jml_skl;
        $k_skd = $karton->jml_skd;
        //kertasluar
        $kl_dk = $kertasluar->jml_dk;
        $kl_lk = $kertasluar->jml_lk;
        $kl_sd = $kertasluar->jml_sd;
        $kl_sl = $kertasluar->jml_sl;
        //kertaskotak
        $kk_adl = $kertaskotak->jml_adl;
        $kk_sd = $kertaskotak->jml_sd;
        $kk_sl = $kertaskotak->jml_sl;

        //harga
        $hrgkarton = Persediaan::where('nama_barang', "Karton")->first()->harga_pokok;
        $hrgkertasluar = Persediaan::where('nama_barang', "Kertas Luar")->first()->harga_pokok;
        $hrgkertaskotak = Persediaan::where('nama_barang', "Kertas Dalam")->first()->harga_pokok;

        $hpp1 = $p*$l*$k_at*$hrgkarton;
        $hpp2 = $p*$t*$k_skl*$hrgkarton;
        $hpp3 = $p*$t*$k_skd*$hrgkarton;
        $hpp4 = $p*$l*$kl_dk*$hrgkertasluar;
        $hpp5 = $p*$l*$kl_lk*$hrgkertasluar;
        $hpp6 = $p*$t*$kl_sd*$hrgkertasluar;
        $hpp7 = $p*$t*$kl_sl*$hrgkertasluar;
        $hpp8 = $p*$l*$kk_adl*$hrgkertaskotak;
        $hpp9 = $p*$t*$kk_sd*$hrgkertaskotak;
        $hpp10 = $l*$t*$kk_sl*$hrgkertaskotak;
        
        $hpptotal = $hpp1 + $hpp2 + $hpp3 + $hpp4 + $hpp5 + $hpp6 + $hpp7 + $hpp8 + $hpp9 + $hpp10;

        //update total
        $ov = ProduksiOverhead::where('id_produksi', $request->id_produksi)->get()->sum('biaya');
        $tk = ProduksiTenaga::where('id_produksi', $request->id_produksi)->get()->sum('upah');
        $bbb = $hpptotal;

        $hpp = $ov + $tk + $bbb;

        Produksi::where('id', $request->id_produksi)
        ->update([
            'harga_pokok_produksi' => $hpp,
            'harga_jual' => $hpp
        ]);
        $idbarang = Produksi::where('id', $request->id_produksi)->first()->id_barang;
        Persediaan::where('id', $idbarang)->update([
            'harga_pokok' => $hpp
        ]);
        //end update

        return $request->id_produksi;
    }

    //menyimpan kedalam DB
    public function store(Request $request)
    {   
        $datapersediaan = Persediaan::create([
            'nama_barang' => $request->nama_barang_produksi,
            'id_jenis' => 3,
            'stok' => 1,
            'harga_pokok' => 0,
            'id_satuan' => 2
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

    //mengubah data
    public function edit($id)
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $deskripsi = Deskripsi::all();
                $header = Produksi::join('persediaan', 'produksi.id_barang', '=', 'persediaan.id')->where('produksi.id', $id)->first(['produksi.*','persediaan.nama_barang']);
                return view('produksi.ubah', [
                    'header' => $header,
                    'deskripsilist' => $deskripsi,
                    'karyawan' => Karyawan::all(),
                    'active' => "produksi"
                ]);
            } else{
                return redirect('/');
            }
        
        }
        return redirect('/login');
    
    }

    //menampilkan data pada form
    public function bacaBahanBaku($id){
        if(session('login') == "true"){
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
            $hargakarton = Persediaan::where('id', 1)->first()->harga_pokok;
            $hargakertasluar = Persediaan::where('id', 2)->first()->harga_pokok;
            $hargakertasdalam = Persediaan::where('id', 3)->first()->harga_pokok;
            $harga_pokok = [
                'karton' => $hargakarton,
                'kertas_luar' => $hargakertasluar,
                'kertas_kotak' => $hargakertasdalam
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
        return redirect('/login');
        
    }

    //memperbarui persediaan
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

        //Produksi
        $data = ProduksiBaku::where('id_produksi', $request->id_produksi)->first();
        $p = $data->panjang;
        $l = $data->lebar;
        $t = $data->tinggi;
        //data 
        $karton = KartonBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertasluar = KertasluarBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertaskotak = KertaskotakBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        //karton
        $k_at = $karton->jml_at;
        $k_skl = $karton->jml_skl;
        $k_skd = $karton->jml_skd;
        //kertasluar
        $kl_dk = $kertasluar->jml_dk;
        $kl_lk = $kertasluar->jml_lk;
        $kl_sd = $kertasluar->jml_sd;
        $kl_sl = $kertasluar->jml_sl;
        //kertaskotak
        $kk_adl = $kertaskotak->jml_adl;
        $kk_sd = $kertaskotak->jml_sd;
        $kk_sl = $kertaskotak->jml_sl;

        //harga
        $hrgkarton = Persediaan::where('nama_barang', "Karton")->first()->harga_pokok;
        $hrgkertasluar = Persediaan::where('nama_barang', "Kertas Luar")->first()->harga_pokok;
        $hrgkertaskotak = Persediaan::where('nama_barang', "Kertas Dalam")->first()->harga_pokok;

        $hpp1 = $p*$l*$k_at*$hrgkarton;
        $hpp2 = $p*$t*$k_skl*$hrgkarton;
        $hpp3 = $p*$t*$k_skd*$hrgkarton;
        $hpp4 = $p*$l*$kl_dk*$hrgkertasluar;
        $hpp5 = $p*$l*$kl_lk*$hrgkertasluar;
        $hpp6 = $p*$t*$kl_sd*$hrgkertasluar;
        $hpp7 = $p*$t*$kl_sl*$hrgkertasluar;
        $hpp8 = $p*$l*$kk_adl*$hrgkertaskotak;
        $hpp9 = $p*$t*$kk_sd*$hrgkertaskotak;
        $hpp10 = $l*$t*$kk_sl*$hrgkertaskotak;
        
        $hpptotal = $hpp1 + $hpp2 + $hpp3 + $hpp4 + $hpp5 + $hpp6 + $hpp7 + $hpp8 + $hpp9 + $hpp10;

        //update total
        $ov = ProduksiOverhead::where('id_produksi', $request->id_produksi)->get()->sum('biaya');
        $tk = ProduksiTenaga::where('id_produksi', $request->id_produksi)->get()->sum('upah');
        $bbb = $hpptotal;

        $hpp = $ov + $tk + $bbb;

        Produksi::where('id', $request->id_produksi)
        ->update([
            'harga_pokok_produksi' => $hpp,
            'harga_jual' => $hpp
        ]);
        $idbarang = Produksi::where('id', $request->id_produksi)->first()->id_barang;
        Persediaan::where('id', $idbarang)->update([
            'harga_pokok' => $hpp
        ]);
        //end update

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

        //Produksi
        $data = ProduksiBaku::where('id_produksi', $request->id_produksi)->first();
        $p = $data->panjang;
        $l = $data->lebar;
        $t = $data->tinggi;
        //data 
        $karton = KartonBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertasluar = KertasluarBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        $kertaskotak = KertaskotakBahanBaku::where('id_bahan_baku', $request->id_produksi)->first();
        //karton
        $k_at = $karton->jml_at;
        $k_skl = $karton->jml_skl;
        $k_skd = $karton->jml_skd;
        //kertasluar
        $kl_dk = $kertasluar->jml_dk;
        $kl_lk = $kertasluar->jml_lk;
        $kl_sd = $kertasluar->jml_sd;
        $kl_sl = $kertasluar->jml_sl;
        //kertaskotak
        $kk_adl = $kertaskotak->jml_adl;
        $kk_sd = $kertaskotak->jml_sd;
        $kk_sl = $kertaskotak->jml_sl;

        //harga
        $hrgkarton = Persediaan::where('nama_barang', "Karton")->first()->harga_pokok;
        $hrgkertasluar = Persediaan::where('nama_barang', "Kertas Luar")->first()->harga_pokok;
        $hrgkertaskotak = Persediaan::where('nama_barang', "Kertas Dalam")->first()->harga_pokok;

        $hpp1 = $p*$l*$k_at*$hrgkarton;
        $hpp2 = $p*$t*$k_skl*$hrgkarton;
        $hpp3 = $p*$t*$k_skd*$hrgkarton;
        $hpp4 = $p*$l*$kl_dk*$hrgkertasluar;
        $hpp5 = $p*$l*$kl_lk*$hrgkertasluar;
        $hpp6 = $p*$t*$kl_sd*$hrgkertasluar;
        $hpp7 = $p*$t*$kl_sl*$hrgkertasluar;
        $hpp8 = $p*$l*$kk_adl*$hrgkertaskotak;
        $hpp9 = $p*$t*$kk_sd*$hrgkertaskotak;
        $hpp10 = $l*$t*$kk_sl*$hrgkertaskotak;
        
        $hpptotal = $hpp1 + $hpp2 + $hpp3 + $hpp4 + $hpp5 + $hpp6 + $hpp7 + $hpp8 + $hpp9 + $hpp10;

        //update total
        $ov = ProduksiOverhead::where('id_produksi', $request->id_produksi)->get()->sum('biaya');
        $tk = ProduksiTenaga::where('id_produksi', $request->id_produksi)->get()->sum('upah');
        $bbb = $hpptotal;

        $hpp = $ov + $tk + $bbb;

        Produksi::where('id', $request->id_produksi)
        ->update([
            'harga_pokok_produksi' => $hpp,
            'harga_jual' => $hpp
        ]);
        $idbarang = Produksi::where('id', $request->id_produksi)->first()->id_barang;
        Persediaan::where('id', $idbarang)->update([
            'harga_pokok' => $hpp
        ]);
        //end update

        return $request->id_produksi;
    }

    public function updateHargaJual(Request $request)
    {
        
        $hpp = Produksi::where('id', $request->id)->value('harga_pokok_produksi');
        $harga_jual = $hpp + round($hpp*$request->markup/100);
        Produksi::where('id', $request->id)->update([
            'harga_jual' => $harga_jual
        ]);
    }

    public function destroy($id)
    {
        Produksi::where('id', $id)->delete();
        return redirect('/produksi')->with('success', 'hapus data persediaan sukses');;
    }

}
