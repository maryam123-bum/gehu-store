@extends('layouts.main')

@section('title')
    <h2>Tambah Jenis Barang</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/jenis" method="POST" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-5">
                <div class="form-group">
                  <label for="id">Id Jenis</label><br>
                  <h5 class="badge bg-info" id="id" style="color:#000">{{ substr_replace("JNS-000",$estimateid,7-strlen($estimateid)) }}</h5>
              
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Nama Jenis</label>
                <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" value="" required>
            </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection