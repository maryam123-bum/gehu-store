@extends('layouts.main')

@section('kembali')
  <a href="/karyawan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
  <h2>Tambah Karyawan</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/karyawan" method="POST" novalidate>
        @csrf
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Masukan nama depan..." value="" required>
            <div class="invalid-feedback">
              Nama depan tidak boleh kosong.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Masukkan nama belakang..." value="" required>
            <div class="invalid-feedback">
              Nama belakang tidak boleh kosong.
            </div>
          </div>

          <div class="col-12">
            <label for="proffesion" class="form-label">Jabatan</label>
            <select class="form-select" name="proffesion" id="proffession" required>
              <option value="">Pilihan...</option>
              <option value="Direktur">Direktur</option>
              <option value="Karyawan Administrasi">Karyawan Administrasi</option>
              <option value="Karyawan Produksi">Karyawan Produksi</option>
              <option value="Pekerja Lepas">Pekerja Lepas</option>
            </select>
            <div class="invalid-feedback">
              Silahkan Pilih Jabatan.
            </div>
           {{-- <span style="font-size: 14px" >Jabatan tidak ada? silahkan <a href="#" data-bs-toggle="modal" data-bs-target="#modaljabatan">tambah jabatan</a></span> --}}
          </div>

          <div class="col-12">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" name="textAddress" id="address" placeholder="Silahkan masukkan alamat..." required></textarea>
            <div class="invalid-feedback">
              Silahkan masukkan alamat.
            </div>
          </div>

          <div class="col-12">
            <label for="jekel" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jekel" id="jekel" required>
              <option value="">Pilihan...</option>
              <option value="lk">Laki-laki</option>
              <option value="pr">Perempuan</option>
            </select>
            <div class="invalid-feedback">
              Silahkan Pilih Jenis Kelamin.
            </div>
          </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" style="background-color: #080E7D;color:#fff" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection