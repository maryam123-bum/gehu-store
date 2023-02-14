@extends('layouts/main')
@section('title')
    <h2>Laporan</h2> 
@endsection
@section('container')
<div class="row">
  <div class="col">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Laporan Barang</h5>
          <h6 class="card-subtitle mb-2 text-muted">Persediaan</h6>
          <a href="/laporan/laporanBarang" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Laporan Harga Pokok Produksi</h5>
          <a href="/laporan/lapHpp" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Laporan Laba Rugi</h5>
          <a href="/laporan/labaRugi" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
</div>
@endsection