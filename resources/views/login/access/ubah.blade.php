@extends('layouts.main')

@section('kembali')
  <a href="/data/access"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Ubah Akses Akun</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/ubah/access" method="POST" novalidate>
        @csrf
        <input type="hidden" value="{{ $admin->id }}" name="id">
        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan email anda" value="{{ $admin->username }}" required>
                <div class="invalid-feedback">
                Username tidak boleh kosong.
                </div>
            </div>
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Minimal 8 huruf & angka" value="{{ $admin->password }}" required>
              <div class="invalid-feedback">
              Password tidak boleh kosong.
              </div>
            </div>
        </div>
        <div class="row">
          <div class="form-group mb-2">
            <label for="karyawan" class="mb-2 font-weight-bold">Nama Karyawan</label>
            <input type="text" class="form-control" disabled value="{{ $admin->nama }}">
           </div>
        </div>
     
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
    </div>
  </div>
</div>
@endsection