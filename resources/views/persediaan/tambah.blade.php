@extends('layouts.main')

@section('title')
    <div class="col">
      <a href="/data/persediaan"><i class="bi bi-chevron-left fs-2"></i></a>
    </div>
    <div class="col-10">
      <h2>Tambah Persediaan</h2>
    </div>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tambah/persediaan" method="POST" novalidate>
        @csrf
        <div class="row g-3">
          <div class="col-12">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukan nama barang..." value="" required>
            <div class="invalid-feedback">
              Nama barang tidak boleh kosong.
            </div>
          </div>

          <div class="col-12">
            <label for="jenis_barang" class="form-label">Jenis</label>
            <select class="form-select" name="jenis_barang" id="jenis_barang" required>
              <option value="">Pilihan...</option>
              @foreach ($jenis as $item)
                <option value="{{ $item['id'] }}">{{ $item['nama_jenis'] }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Silahkan Pilih Jenis Barang.
            </div>
          </div>

          <div class="col-sm-5">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukan jumlah stok..." value="" required>
            <div class="invalid-feedback">
              Stok tidak boleh kosong.
            </div>
          </div>

          <div class="col-sm-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" name="satuan" id="satuan" required>
              <option value="">Pilihan...</option>
              @foreach ($satuan as $item)
                <option value="{{ $item['id'] }}">{{ $item['nama_satuan'] }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Silahkan Pilih Satuan.
            </div>
          </div>

          <div class="col-sm-4">
            <label for="harga_pokok" class="form-label">Harga Pokok</label>
            <input type="text" class="form-control" name="harga_pokok" id="harga_pokok" placeholder="Masukan harga pokok..." value="" required>
            <div class="invalid-feedback">
              Harga Pokok tidak boleh kosong.
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