@extends('layouts.main')

@section('title')
    <h2>Ubah Pembelian</h2>
@endsection

@section('container')
<div class="col-md-12 col-lg-12">
  <div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-10">
                <h3 class="font-weight-bold">
                    Data Pembelian
                </h3>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary" onclick="store()">Buat Transaksi</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_pembelian">
                            <div class="col-2 font-weight-bold">
                                <h5>Nama Pemasok</h5>
                            </div>
                            <div class="col-3 mb-2">
                                <input type="text" name="nama_pemasok" class="d-inline form-control form-control-sm" width="" value="{{ $header['nama_pemasok'] }}" id="nama_pemasok">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-2 font-weight-bold">
                                <h5>Tanggal</h5>
                            </div>
                            <div class="col-4">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <h5><span class="badge bg-success">{{ $header['tgl_pembelian'] }}</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-bold">
                                <h5>No Invoice</h5>
                            </div>
                            <div class="col-5">
                                <h5><span class="badge bg-success">{{ $header['id'] }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                
                <div class="card">
                    <h4 class="font-weight-bold pl-4 pr-4 pt-4">
                        Data Barang
                    </h4>
                    <div class="card-body">
                        <div id="read"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="barang" class="mb-2 font-weight-bold">Nama Barang</label>
                                    <select name="barang" id="barang" class="form-select" >
                                        @foreach ($barang as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama_barang'] }}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: 14px" >Barang tidak ada? silahkan <a href="/tambah/persediaan">tambah barang</a></span>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="mb-2 font-weight-bold">Harga Barang</label>
                                    <input type="text" class="form-control mb-2" placeholder="0" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah" class="mb-2 font-weight-bold">Jumlah Barang</label>
                                    <input type="text" class="form-control mb-2" placeholder="0" name="jumlah" id="jumlah">
                                </div>
                                <button class="w-100 btn btn-primary btn-md" type="button" onclick="insert()">Simpan Data</button>
                            
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        read({{ $header['id'] }})
    });

    // Read Database
    function read(id) {
        $.get("{{ url('/read/pembelian') }}/"+ id, {}, function(data, status) {
            $("#read").html(data);
        });
    }
    // untuk proses create data
    function store() {
        var nama_pemasok = $("#nama_pemasok").val();
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/pembelian') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "nama_pemasok": nama_pemasok
            },
            success: function(data) {
                $("#id_pembelian").val(data.id)
            }
        });
    }
    function insert() {
        var id_pembelian = $("#id_pembelian").val()
        var id_barang = $("#barang").val()
        var jumlah = $("#jumlah").val()
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/pembelian-detail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_pembelian": id_pembelian,
                "id_barang": id_barang,
                "jumlah": jumlah
            },
            success: function(data) {
                read(data)
                console.log(data)
            }
        });
    }
    

  </script>
@endsection