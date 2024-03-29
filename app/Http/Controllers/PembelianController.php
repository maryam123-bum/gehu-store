<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\PembelianDetailDeskripsi;
use App\Models\Deskripsi;

class PembelianController extends Controller
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
            $data_pembelian = Pembelian::all();
            
            return view('pembelian/data', [
                'judul' => "Pembelian",
                'access' => $this->access,
                'data' => $data_pembelian,
                'active' => "pembelian"
            ]);
        }
        return redirect('/login');
    }

    //membuat data
    public function create()
    { 
        if(session('login') == "true"){  
            if(session('jabatan') == $this->access) {
                $deskripsi = Deskripsi::all();
                $latestid = Pembelian::latest()->first();
                if($latestid){
                    $latestid = $latestid->id + 1;
                }else{
                    $latestid = 1;
                }
                return view('pembelian/tambah', [
                    'barang' => Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                        ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                        ->where('persediaan.id_jenis', '!=', '3')
                        ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']),
                    'active' => "pembelian",
                    'estimateid' => $latestid,
                    'deskripsilist' => $deskripsi
                ]);
            } else {
                return redirect('/');
            }
        }
        return redirect('/login');
    }

    //menampilkan data barang dalam form
    public function bacaBarang($id = 0){
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $baranglist = [];
                if($id != 0){
                    $baranglist = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
                    ->join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                    ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                    ->where('id_pembelian', $id)
                    ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis', 'pembelian_detail.jumlah', 'pembelian_detail.diskon', 'pembelian_detail.id', 'pembelian_detail.id_pembelian']);
                    
                }
                return view('pembelian/barang')->with([
                    'data' => $baranglist
                ]);
            } else{
                return redirect('/');
            }
            
        }
        return redirect('/login');
    }

    //menampilkan data deskripsi pada form
    public function bacaDeskripsi($id = 0){
        if(session('login') == "true"){
            $deskripsiList = [];
            if($id != 0){
                $deskripsiList = PembelianDetailDeskripsi::join('deskripsi', 'pembelian_detail_deskripsi.id_deskripsi', '=', 'deskripsi.id')
                ->where('id_pembelian', $id)
                ->get();
            }
            return view('pembelian/deskripsi')->with([
                'data' => $deskripsiList
            ]);
        }
        return redirect('/login');
    }

    //menampilkan data total pada form
    public function bacaTotal($id = 0){
        $total = 0;
        if($id != 0){
            $totalBarang = 0;
            $totalDiskon = 0;
            $data = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
                ->where('id_pembelian', $id)
                ->get(['persediaan.harga_pokok', 'pembelian_detail.jumlah', 'pembelian_detail.diskon']);
            foreach($data as $item){
                $totalDiskon = $totalDiskon + $item['diskon'];
                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
            $dataDeskripsi = PembelianDetailDeskripsi::where('id_pembelian', $id)->get();
            $totalDeskripsi = $dataDeskripsi->sum('biaya');
            $total = $totalBarang - $totalDiskon + $totalDeskripsi;
        }
        return $total;
    }

    //menyimpan data yg di tambahkan pada form
    public function insertBarang(Request $request)
    {   
        PembelianDetail::create([
            'id_pembelian' => $request->id_pembelian,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'diskon' => $request->diskon
        ]);
        //update stok
        $stok = Persediaan::where('id', $request->id_barang)->first()->stok;
        Persediaan::where('id', $request->id_barang)->update(['stok' => $stok + $request->jumlah]);
        //update total
            $totalBarang = 0;
            $totalDiskon = 0;
            //menggabungkan tabel pembelianDetail dg persediaan pk=id fk=id_barang
            //get= harga_pokok->persediaan, jumlah->pembelian_detail, diskon->pembelian_detail
            $data = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
                ->where('id_pembelian', $request->id_pembelian)
                ->get(['persediaan.harga_pokok', 'pembelian_detail.jumlah', 'pembelian_detail.diskon']);
            foreach($data as $item){
                $totalDiskon = $totalDiskon + $item['diskon'];
                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
            $dataDeskripsi = PembelianDetailDeskripsi::where('id_pembelian', $request->id_pembelian)->get();
            $totalDeskripsi = $dataDeskripsi->sum('biaya');
            $total = $totalBarang - $totalDiskon + $totalDeskripsi;
            

            Pembelian::where('id', $request->id_pembelian)
                ->update([
                    'total' => $total
                ]);
            //end update
        return $request->id_pembelian;
    }

    //menambah deskripsi pada form
    public function insertDeskripsi(Request $request)
    {
        PembelianDetailDeskripsi::create([
            'id_pembelian' => $request->id_pembelian,
            'id_deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya
        ]);

        //update total
            $totalBarang = 0;
            $totalDiskon = 0;
            $data = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
                ->where('id_pembelian', $request->id_pembelian)
                ->get(['persediaan.harga_pokok', 'pembelian_detail.jumlah', 'pembelian_detail.diskon']);
            foreach($data as $item){
                $totalDiskon = $totalDiskon + $item['diskon'];
                $totalBarang = $totalBarang + ($item['harga_pokok'] * $item['jumlah']);
            }
            $dataDeskripsi = PembelianDetailDeskripsi::where('id_pembelian', $request->id_pembelian)->get();
            $totalDeskripsi = $dataDeskripsi->sum('biaya');
            $total = $totalBarang - $totalDiskon + $totalDeskripsi;
            

            Pembelian::where('id', $request->id_pembelian)
            ->update([
                'total' => $total
            ]);
            //end update
        return $request->id_pembelian;
    }

    //menyimpan data pada DB
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

    //mengubah data
    public function edit($id)
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $deskripsi = Deskripsi::all();
                $header = Pembelian::where('id', $id)->first();
                $baranglist = Persediaan::join('jenis_persediaan', 'persediaan.id_jenis', '=', 'jenis_persediaan.id')
                        ->join('satuan', 'persediaan.id_satuan', '=', 'satuan.id')
                        ->where('persediaan.id_jenis', '!=', '3')
                        ->get(['persediaan.*', 'satuan.nama_satuan', 'jenis_persediaan.nama_jenis']);
                        
                return view('pembelian.ubah', [
                    'header' => $header,
                    'barang' => $baranglist,
                    'active' => "pembelian",
                    'deskripsilist' => $deskripsi
                ]);
            } else{
                return redirect('/');
            }
        
        }
        return redirect('/login');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Pembelian::where('id', $id)->delete();
        return redirect('/pembelian')->with('success', 'hapus data pembelian sukses');
    }

    public function destroyBarangDetail(Request $request, $id)
    {

        $data1 = Pembelian::where('id', $request->id_pembelian)->first();
        //menggabungkan tabel pembelianDetail dg persediaan pk=id fk=id_barang
        //get= harga_pokok->persediaan, jumlah->pembelian_detail, diskon->pembelian_detail
        $data = PembelianDetail::join('persediaan', 'pembelian_detail.id_barang', '=', 'persediaan.id')
            ->where('pembelian_detail.id', $id)
            ->first();
        $stok = Persediaan::where('id', $data->id_barang)->first()->stok;
        Persediaan::where('id', $data->id_barang)->update([
            'stok' => $stok - $data->jumlah
        ]);
        $harga = $data->jumlah * $data->harga_pokok;
        $hasil = $data1->total - $harga;
        Pembelian::where('id', $request->id_pembelian)
            ->update([
                'total' => $hasil
            ]);
        //end update
        
        PembelianDetail::where('id', $id)->delete();
        return redirect()->back()->with('success', 'hapus data pembelian sukses');
    }
    public function destroyDeskripsiDetail($id)
    {
        Pembelian::where('id', $id)->delete();
        return redirect('/pembelian')->with('success', 'hapus data pembelian sukses');
    }
}
