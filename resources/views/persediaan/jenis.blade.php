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
                <h6><span class="badge bg-light" style="color:#000"><?php echo substr_replace("JNS-000","1",7-strlen("1")); ?></span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Nama Jenis</label>
                <input type="text" class="form-control" name="namaJenis" id="namaJenis" value="" required>
            </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection