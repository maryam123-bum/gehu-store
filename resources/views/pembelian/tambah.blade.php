@extends('layouts.main')

@section('kembali')
  <a href="/pembelian"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
        <h2>Tambah Pembelian</h2>
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
                <button type="button" class="btn" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_pembelian">
                            <div class="col-2 font-weight-bold">
                                <h6>Nama Pemasok</h6>
                            </div>
                            <div class="col-3 mb-2">
                                <input type="text" name="nama_pemasok" class="d-inline form-control form-control-sm" placeholder="Masukkan Nama Pemasok" id="nama_pemasok">
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
                                <h6><span class="badge bg-light" style="color:#000">Buat Transaksi terlebih dahulu</span></h6>
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
                                <select name="barang" id="barang" class="form-select" disabled>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nama_barang'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="mb-2 font-weight-bold">Jumlah Barang (CM)</label>
                                <input type="text" class="form-control mb-2" placeholder="0" name="jumlah" id="jumlah" disabled>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="mb-2 font-weight-bold">Potongan</label>
                                <input type="text" class="form-control mb-2" placeholder="0" name="diskon" id="diskon" disabled>
                            </div>
                            <button class="w-100 btn btn-md" style="background-color: #27272d;color:#fff" type="button" disabled>Buat Transaksi terlebih dahulu</button>
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
                        <div class="form-group mb-3">
                            <select name="deskripsi" id="deskripsi" class="form-select" disabled>
                                <option value="" selected>Pilih Deskripsi...</option>
                                @foreach ($deskripsilist as $item)  
                                    <option value="{{ $item['id'] }}">{{ $item['deskripsi'] }}</option>
                                @endforeach
                            </select>
                            <span style="font-size: 14px" >Deskripsi tidak ada? silahkan <a href="/tambah/deskripsi">tambah deskripsi</a></span>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="mb-2 font-weight-bold">Biaya</label>
                            <input type="text" class="form-control mb-2" placeholder="" name="biaya" id="biaya" disabled>
                        </div>
                        <button class="w-100 btn btn-md" style="background-color: #27272d;color:#fff" type="button" disabled>Buat Transaksi terlebih dahulu</button>
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
        bacaBarang(0)
        bacaDeskripsi(0)
        fetchTotal(0)
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
        if(nama_pemasok == ""){
            panggilAlertValidation("Nama Pemasok Kosong")
        }else{
            $.ajax({
            type: "post",
            url: "{{ url('/tambah/pembelian') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "nama_pemasok": nama_pemasok
            }, success: function(data) {
                    if(data){
                        swal({
                            title: "Sukses",
                            text: "Pembelian dibuat!",
                            icon: "success",
                            button: "Close!",
                        });
                    }
                    window.location.href = '/ubah/pembelian/' + data.id;
                }
            });
        }   
    }

    function panggilAlertValidation(text){
        swal({
              title: "Gagal",
              text: text,
              icon: "error",
              button: "Tutup!",
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