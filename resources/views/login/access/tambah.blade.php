@extends('layouts.main')

@section('title')
    <h2>Tambah Akses User</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/access" method="POST" novalidate>
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan email anda" value="" required>
                <div class="invalid-feedback">
                Username tidak boleh kosong.
                </div>
            </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Minimal 8 huruf & angka" value="" required>
            <div class="invalid-feedback">
            Passwoard tidak boleh kosong.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group mb-2">
            <label for="karyawan" class="mb-2 font-weight-bold">Nama Karyawan</label>
            <select name="id_karyawan" id="id_karyawan" class="form-select" >
                @foreach ($karyawan as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                @endforeach
            </select>
           </div>
        </div>
     
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
    </div>
  </div>
</div>
@endsection