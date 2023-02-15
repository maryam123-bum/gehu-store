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
                {{-- <button type="button" class="btn btn-primary" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button> --}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_pembelian" value="<?php echo $header['id'];?>">
                            <div class="col-2 font-weight-bold">
                                <h6>Nama Pemasok</h6>
                            </div>
                            <div class="col-3 mb-2">
                                <input type="text" name="nama_pemasok" class="d-inline form-control form-control-sm" width="" id="nama_pemasok" value="<?php echo $header['nama_pemasok'];?>">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-2 font-weight-bold">
                                <h6>Tanggal</h6>
                            </div>
                            <div class="col-4">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <h6><span class="badge bg-light" style="color:#000">{{ date("d/F/Y") }}</span></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-bold">
                                <h6>No Invoice</h6>
                            </div>
                            <div class="col-5">
                                <h6><span class="badge bg-light" style="color:#000"><?php echo substr_replace("INV-000","1",7-strlen("1")); ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                
                <div class="card">
                    <h4 class="font-weight-bold p-4">
                        Data Barang
                    </h4>
                    <div class="card-body">
                        <div id="barangId"></div>
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
                            <button class="w-100 btn btn-primary btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="insertBarang()">Simpan Data</button>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                
                <div class="card">
                    <h4 class="font-weight-bold p-4">
                        Biaya Tambahan
                    </h4>
                    <div class="card-body">
                        <div id="deskripsiId"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="harga" class="mb-2 font-weight-bold">Deskripsi</label>
                            <input type="text" class="form-control mb-2" placeholder="0" name="deskripsi" id="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="mb-2 font-weight-bold">Biaya</label>
                            <input type="text" class="form-control mb-2" placeholder="0" name="biaya" id="biaya">
                        </div>
                        <button class="w-100 btn btn-primary btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="insertDeskripsi()">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                <div class="card">
                    <h4 class="font-weight-bold p-4">
                        Total : <span id="totalSemua">0</span></p>
                    </h4>
                </div>
            </div>
        </div>
        {{-- <div class="col-2">
            <button type="button" class="btn btn-primary" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        var id = "<?php echo $header['id'];?>"
        bacaBarang(id)
        bacaDeskripsi(id)
        bacaTotal(id)
    });

    function fetchTotal(num){
        $('#totalSemua').html(num)
    }

    // Read Database
    function bacaBarang(id) {
        $.get("{{ url('/barang/pembelian') }}/"+ id, {}, function(data, status) {
            $("#barangId").html(data);
        });
    }
    function bacaTotal(id) {
        $.get("{{ url('/total/pembelian') }}/"+ id, {}, function(data, status) {
            fetchTotal(data)
        });
    }
    function bacaDeskripsi(id) {
        $.get("{{ url('/deskripsi/pembelian') }}/"+ id, {}, function(data, status) {
            $("#deskripsiId").html(data);
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
                if(data){
                    swal({
                        title: "Sukses",
                        text: "Pembelian dibuat!",
                        icon: "success",
                        button: "Close!",
                    });
                }
            }
        });
    }
    function insertBarang() {
        var id_pembelian = $("#id_pembelian").val()
        var id_barang = $("#barang").val()
        var jumlah = $("#jumlah").val()
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/barang/pembelian-detail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_pembelian": id_pembelian,
                "id_barang": id_barang,
                "jumlah": jumlah
            },
            success: function(data) {
                bacaBarang(data)
                bacaTotal(data)
            }
        });
    }
    function insertDeskripsi() {
        var id_pembelian = $("#id_pembelian").val()
        var deskripsi = $("#deskripsi").val()
        var biaya = $("#biaya").val()
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/deskripsi/pembelian-detail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_pembelian": id_pembelian,
                "deskripsi": deskripsi,
                "biaya": biaya
            },
            success: function(data) {
                bacaDeskripsi(data)
                bacaTotal(data)
            }
        });
    }
  </script>
  <script>
      @if (session('success'))
          swal({
              title: "Sukses",
              text: "{{ session('success') }}",
              icon: "success",
              button: "Close!",
          });
      @endif
      
  </script>
@endsection