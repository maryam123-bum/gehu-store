@extends('layouts.main')

@section('title')
    <div class="col">
        <a href="/pembelian"><i class="bi bi-chevron-left fs-2"></i></a>
    </div>
    <div class="col-10">
        <h2>Ubah Pembelian</h2>
    </div>
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
                                {{-- <input type="text" name="nama_pemasok" class="d-inline form-control form-control-sm" width="" id="nama_pemasok" value="<?php echo $header['nama_pemasok'];?>"> --}}
                                <h6>{{ $header['nama_pemasok'] }}</h6>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-2 font-weight-bold">
                                <h6>Tanggal</h6>
                            </div>
                            <div class="col-4">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <h6><span class="badge bg-light" style="color:#000">{{ $header->tgl_pembelian }}</span></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-bold">
                                <h6>No Invoice</h6>
                            </div>
                            <div class="col-5">
                                <h6><span class="badge bg-dark text-white"><?php echo substr_replace("INV-000",$header->id,7-strlen($header->id)); ?></span></h6>
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
                                <label for="jumlah" class="mb-2 font-weight-bold">Jumlah Barang</label>
                                <input type="text" class="form-control mb-2" placeholder="0" name="jumlah" id="jumlah">
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="mb-2 font-weight-bold">Potongan</label>
                                <input type="text" class="form-control mb-2" placeholder="0" name="diskon" id="diskon">
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
                        <div class="form-group mb-3">
                            <select name="deskripsi" id="deskripsi" class="form-select" required>
                                <option value="" selected>Pilih Deskripsi...</option>
                                @foreach ($deskripsilist as $item)  
                                    <option value="{{ $item['id'] }}">{{ $item['deskripsi'] }}</option>
                                @endforeach
                            </select>
                            <span style="font-size: 14px" >Deskripsi tidak ada? silahkan <a href="/tambah/deskripsi">tambah deskripsi</a></span>
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
                <div class="col-2 py-4">
                    <button type="button" class="btn" style="background-color: #080E7D"><a href="/pembelian" style="color:#fff">Selesai</a></button>
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
        var id = "{{ $header->id }}"
        bacaBarang(id)
        bacaDeskripsi(id)
        fetchTotal(id)
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
        
    }
    function insertBarang() {
        var id_pembelian = $("#id_pembelian").val()
        var id_barang = $("#barang").val()
        var jumlah = $("#jumlah").val()
        var diskon = $("#diskon").val()
        if(id_pembelian == ""){
            panggilAlertValidation('Buat Transaksi Dahulu')
        }else if(id_barang == ""){
            panggilAlertValidation('Tambahkan Barang Dahulu')
        }else if(jumlah == ""){
            panggilAlertValidation('Jumlah Barang Kosong!!')
        }else if(diskon == ""){
            panggilAlertValidation('diskon kosong!!')
        }else{
            $.ajax({
            type: "post",
            url: "{{ url('/tambah/barang/pembelian-detail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_pembelian": id_pembelian,
                "id_barang": id_barang,
                "jumlah": jumlah,
                "diskon": diskon
            }, success: function(data) {
                    bacaBarang(data)
                    bacaTotal(data)
                }
            });
        }
        
    }
    function insertDeskripsi() {
        var id_pembelian = $("#id_pembelian").val()
        var deskripsi = $("#deskripsi").val()
        var biaya = $("#biaya").val()
        if(id_pembelian == ""){
            panggilAlertValidation('Buat Transaksi Dahulu')
        }else if(deskripsi == ""){
            panggilAlertValidation('Tambahkan Deskripsi Dahulu')
        }else if(biaya == ""){
            panggilAlertValidation('Biaya Kosong!!')
        }else{
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