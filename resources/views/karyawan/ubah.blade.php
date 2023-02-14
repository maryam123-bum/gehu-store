@extends('layouts.main')

@section('title')
    <h2>Ubah Karyawan</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/ubah/karyawan" method="POST" novalidate>
        @csrf
        <input type="hidden" value="{{ $data['id'] }}" name="id" readonly>
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama lengkap..." value="{{ $data['nama'] }}" required>
            <div class="invalid-feedback">
              Nama Lengkap tidak boleh kosong.
            </div>
          </div>

          <div class="col-12">
            <label for="proffesion" class="form-label">Jabatan</label>
            <select class="form-select" name="proffesion" id="proffession" value="{{ $data['jabatan'] }}" required>
              <option value="">Pilihan...</option>
              <option value="Direktur">Direktur</option>
              <option value="Karyawan Administrasi">Karyawan Administrasi</option>
              <option value="Karyawan Produksi">Direktur</option>
            </select>
            <div class="invalid-feedback">
              Silahkan Pilih Jabatan.
            </div>
          </div>

          <div class="col-12">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" name="textAddress" id="address" placeholder="Silahkan masukkan alamat..." required>{{ $data['alamat'] }}</textarea>
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

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
@endsection