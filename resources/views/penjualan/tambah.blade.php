@extends('layouts.main')

@section('title')
    <h2>Tambah Penjualan</h2>
@endsection

@section('container')
<div class="col-md-12 col-lg-12">
  <div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-10">
                <h3 class="font-weight-bold">
                    Data Penjualan
                </h3>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_penjualan">
                            <div class="col-2 font-weight-bold">
                                <h6>Nama Pelanggan</h6>
                            </div>
                            <div class="col-3 mb-2">
                                <input type="text" name="nama_pelanggan" class="d-inline form-control form-control-sm" width="" id="nama_pelanggan">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-2 font-weight-bold">
                                <h6>Tanggal</h6>
                            </div>
                            <div class="col-4">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <h5><span class="badge bg-light" style="color:#000">{{ date("d/F/Y") }}</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-bold">
                                <h6>No Invoice</h6>
                            </div>
                            <div class="col-5">
                                <h5><span class="badge bg-light" style="color:#000">20230102001</span></h5>
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
                        <div id="read">
                            <table class="table table bordered">
                                <tr style="background-color: #28276A; color:#fff">
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>col 2.1</td>
                                    <td>col 2.2</td>
                                </tr>
                            </table>
                        </div>
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
                                <button class="w-100 btn btn-primary btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="insert()">Simpan Data</button>
                            
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
        read(0)
    });

    // Read Database
    function read(id) {
        $.get("{{ url('/read/penjualan') }}/"+ id, {}, function(data, status) {
            $("#read").html(data);
        });
    }
    // untuk proses create data
    function store() {
        var nama_pemasok = $("#nama_pelanggan").val();
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/penjualan') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "nama_pelanggan": nama_pelanggan
            },
            success: function(data) {
                $("#id_penjualan").val(data.id)
            }
        });
    }
    function insert() {
        var id_penjualan = $("#id_penjualan").val()
        var id_barang = $("#barang").val()
        var jumlah = $("#jumlah").val()
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/penjualan-detail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_penjualan": id_penjualan,
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