@extends('layouts.main')

@section('kembali')
  <a href="/persediaan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Tambah Deskripsi</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/deskripsi" method="POST" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-5">
                <h6><span class="badge bg-light" style="color:#000"><?php echo substr_replace("Biaya-000",$estimateid,7-strlen($estimateid)); ?></span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Deskripsi Biaya</label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="" required>
            </div>
        </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection