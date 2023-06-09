@extends('layouts.main')

@section('kembali')
  <a href="/persediaan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Ubah Persediaan</h2>
@endsection

@section('container')
<div class="col-md-7 col-lg-8">
  <div class="card">
    <div class="card-header">
      <h5>Data Information</h5>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/ubah/persediaan" method="POST" novalidate>
        @csrf
        <input type="hidden" value="{{ $data['id'] }}" name="id" readonly>
        <div class="row g-3">
          <div class="col-12">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{ $data['nama_barang'] }}" id="nama_barang" placeholder="Masukan nama barang..." required>
            <div class="invalid-feedback">
              Nama barang tidak boleh kosong.
            </div>
          </div>

          <div class="col-12">
            <label for="jenis_barang" class="form-label">Jenis</label>
            <select class="form-select" name="jenis_barang" id="jenis_barang" value={{ $data->id_jenis }}>
              <option value="0" selected>Pilihan...</option>
              @foreach ($jenis as $item)
                <option value="{{ $item['id'] }}">{{ $item['nama_jenis'] }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-sm-5">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" disabled name="stok" value={{ $data['stok'] }} id="stok" placeholder="Masukan jumlah stok..." required>
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
            <input type="text" class="form-control" name="harga_pokok" value="{{ $data['harga_pokok'] }}" id="harga_pokok" placeholder="Masukan harga pokok..." required>
            <div class="invalid-feedback">
              Harga Pokok tidak boleh kosong.
            </div>
          </div>

        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Ubah</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $("#jenis_barang").val({{ $data->id_jenis }})
      $("#satuan").val({{ $data->id_satuan }})
    })
  </script>
@endsection