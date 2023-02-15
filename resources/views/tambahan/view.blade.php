@extends('layouts/main')
@section('title')
    <h2>Laporan</h2> 
@endsection
@section('container')
<div class="row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Data Satuan Barang</h5>
          <a href="/persediaan/satuan" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Data Jenis Barang</h5>
          <a href="/persediaan/jenis" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center">Data Deskripsi</h5>
          <a href="/persediaan/deskripsi" class="card-link" style="text-align: center">Preview</a>
        </div>
    </div>
    <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">Data User</h5>
              <a href="/login/admin" class="card-link" style="text-align: center">Preview</a>
            </div>
        </div>
    </div>
</div>
@endsection