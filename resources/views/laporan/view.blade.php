@extends('layouts/main')
@section('title')
    <h2>Laporan</h2> 
@endsection
@section('container')
<div class="row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Laporan Persediaan Barang</h5>
          <a href="/laporan/laporanBarang" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Laporan Harga Pokok Produksi</h5>
          <a href="/laporan/lapHpp" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Laporan Laba Rugi</h5>
          <a href="/laporan/labaRugi" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
</div>
@endsection