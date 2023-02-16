@extends('layouts.main')

@section('title')
    <h2>Tambah Satuan Barang</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/satuan" method="POST" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-5">
                <h6><span class="badge bg-light" style="color:#000"><?php echo substr_replace("SAT-000",$estimateid,7-strlen($estimateid)); ?></span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Nama Satuan</label>
                <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" value="" required>
            </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection