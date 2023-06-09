<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Persediaan;
use App\Models\Produksi;
use App\Models\Penjualan;

class LaporanController extends Controller
{
    public function index(){
        return view('/laporan/view', [
            'active' => "laporan"
        ]);
    }

    public function lapBarang(){
        return view('/laporan/laporanBarang', [
            'active' => "laporan"
        ]);
    }

    public function labaRugi(){
        $penjualan = Penjualan::whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('total');
        $diskon = Pembelian::join('pembelian_detail', 'pembelian.id', '=', 'pembelian_detail.id_pembelian')
            ->whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('diskon');
        $biaya_pengiriman = Penjualan::join('penjualan_detail_deskripsi', 'penjualan.id', '=', 'penjualan_detail_deskripsi.id_penjualan')
            ->where('penjualan_detail_deskripsi.id_deskripsi', 1)
            ->whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('biaya');
        $listrik_air = Penjualan::join('penjualan_detail_deskripsi', 'penjualan.id', '=', 'penjualan_detail_deskripsi.id_penjualan')
            ->where('penjualan_detail_deskripsi.id_deskripsi', 2)
            ->whereDate('tgl_penjualan','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_penjualan','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('biaya');
        $tenaga_kerja_langsung = Produksi::join('produksi_tenaga_kerja', 'produksi.id', '=', 'produksi_tenaga_kerja.id_produksi')
            ->whereDate('tgl_produksi','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_produksi','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('upah');
        
        return view('/laporan/labaRugi', [
            'active' => "laporan",
            'penjualan' => $penjualan,
            'diskon' => $diskon,
            'biaya_pengiriman' => $biaya_pengiriman,
            'listrik_air' => $listrik_air,
            'gaji_karyawan' => $tenaga_kerja_langsung,
        ]);
    }
    public function lapHpp(){
        $pembelian_bahan_baku = Pembelian::whereDate('tgl_pembelian','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_pembelian','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('total');
        $data = Persediaan::where('id_satuan', '1')->get();

        $persediaan_bahan_baku_akhir = 0;
        foreach ($data as $value) {
            $persediaan_bahan_baku_akhir = $persediaan_bahan_baku_akhir + ($value->stok * $value->harga_pokok);
        }
        $persediaan_bahan_baku_awal = $persediaan_bahan_baku_akhir - $pembelian_bahan_baku;

        //tenaga kerja
        $tenaga_kerja_langsung = Produksi::join('produksi_tenaga_kerja', 'produksi.id', '=', 'produksi_tenaga_kerja.id_produksi')
            ->whereDate('tgl_produksi','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_produksi','<=', date('Y-m-d',strtotime('2023-06-31')))->get()->sum('upah');
        //overhead
        $overhead_deskripsi = Produksi::join('produksi_overhead', 'produksi.id', '=', 'id_produksi')
            ->join('deskripsi', 'deskripsi.id', '=', 'produksi_overhead.id_deskripsi')
            ->whereDate('tgl_produksi','>=', date('Y-m-d',strtotime('2023-06-01')))->whereDate('tgl_produksi','<=', date('Y-m-d',strtotime('2023-06-31')))->get(['biaya'])->sum('biaya');
        
        $total = $persediaan_bahan_baku_awal + $pembelian_bahan_baku + $persediaan_bahan_baku_akhir + $tenaga_kerja_langsung + $overhead_deskripsi;
        $data = [
            'pembelian_bahan_baku' => $pembelian_bahan_baku,
            'persediaan_bahan_baku_akhir' => $persediaan_bahan_baku_akhir,
            'persediaan_bahan_baku_awal' => $persediaan_bahan_baku_awal,
            'total_pembelian_bahan_baku' => $persediaan_bahan_baku_awal + $pembelian_bahan_baku,
            'total_biaya_bahan_baku' => $persediaan_bahan_baku_awal + $pembelian_bahan_baku + $persediaan_bahan_baku_akhir,
            'tenaga_kerja_langsung' => $tenaga_kerja_langsung,
            'overhead_deskripsi' => $overhead_deskripsi,
            'total' => $total
        ];
        return view('/laporan/lapHpp', [
            'active' => "laporan",
            'data' => $data,
        ]);
    }
}
