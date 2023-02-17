@extends('layouts.main')

@section('title')
    <h2>Tambah Produksi</h2>
@endsection

@section('container')
<div class="col-md-12 col-lg-12">
  <div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-10">
                <h3 class="font-weight-bold">
                    Data Produksi
                </h3>
            </div>
            <div class="col-2">
              <button class="btn btn-primary" onclick="store()">Buat Transaksi</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_produksi">
                            <div class="col-2 font-weight-bold">
                                <h6>Kode Produksi</h6>
                            </div>
                            <div class="col-3">
                              <h5><span class="badge bg-light" style="color:#000">20230102001</span></h5>
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
                                <h6>Nama Barang Produksi</h6>
                            </div>
                            <div class="col-3">
                                <h6><input type="text" name="nama_barang_produksi" class="d-inline form-control form-control-sm" width="" id="nama_barang_produksi"></h6>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-2 font-weight-bold">
                              <h6>Jumlah Buat</h6>
                            </div>
                            <div class="col-4">
                                <h5><span class="badge bg-light" style="color:#000">1</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
          <div class="col-8"> 
              <div class="card px-3">
                <div class="row mb-3">
                  <div class="col">
                    <h4 class="font-weight-bold pl-4 pr-4 pt-4">
                      Biaya Bahan Baku
                    </h4>
                  </div>
                </div>
                <div class="card-body">
                  <div id="bahanBakuId"></div>
                </div>
              </div>
          </div>
          <div class="col-4">
              <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Panjang</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_panjang" id="bb_panjang">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Lebar</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_lebar" id="bb_lebar">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Tinggi</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_tinggi" id="bb_tinggi">
                        </div>
                      </div>
                    </div>
                    <button class="w-100 btn btn-light btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="handleProduksiBaku()">Input</button>
                  </div>
              </div>
              <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h6>Karton</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Alas & Tutup</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_at" id="karton_at">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Kotak Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_skl" id="karton_skl">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Kotak Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_skd" id="karton_skd">
                      </div>
                    </div> 
                    <hr>
                    <div class="row">
                      <div class="col">
                        <h6>Kertas Luar</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Dalam Kotak</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_dk" id="kertasluar_dk">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Luar Kotak</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_lk" id="kertasluar_lk">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_sd" id="kertasluar_sd">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_sl" id="kertasluar_sl">
                      </div>
                    </div> 
                    <hr>
                    <div class="row">
                      <div class="col">
                        <h6>Kertas Kotak</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Alas Dalam Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_adl" id="kertaskotak_adl">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_sd" id="kertaskotak_sd">
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_sl" id="kertaskotak_sl">
                      </div>
                    </div> 
                    <button class="w-100 btn btn-light btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="handleSetData()">Input</button>
                </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-8"> 
            <div class="card px-3">
              <h4 class="font-weight-bold pl-4 pr-4 pt-4">
                  Biaya Tenaga Kerja
              </h4>
              <div class="card-body">
                  <div id="tenagaKerjaId"></div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="barang" class="mb-2 font-weight-bold">Nama Karyawan</label>
                        <select name="karyawan" id="id_karyawan" class="form-select" >
                            @foreach ($karyawan as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        <span style="font-size: 14px" >Karyawan tidak ada? silahkan <a href="/tambah/karyawan">tambah karyawan</a></span>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="mb-2 font-weight-bold">Upah</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="upah" id="upah" >
                    </div>
                    <button class="w-100 btn btn-light btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="handleTenagaKerja()">Input</button>
                </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-8"> 
              <div class="card px-3">
                <h4 class="font-weight-bold pl-4 pr-4 pt-4">
                    Biaya Overhead Pabrik
                </h4>
                <div class="card-body">
                    <div id="overheadId"></div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card">
                  <div class="card-body">
                      <div class="form-group mb-2">
                        <label for="deskripsi" class="mb-2 font-weight-bold">Deskripsi</label>
                        <select name="ov_deskripsi" id="ov_deskripsi" class="form-select" required>
                          <option value="" selected>Pilih Deskripsi...</option>
                          @foreach ($deskripsilist as $item)  
                              <option value="{{ $item['id'] }}">{{ $item['deskripsi'] }}</option>
                          @endforeach
                        </select>
                        <span style="font-size: 14px" >Deskripsi tidak ada? silahkan <a href="/tambah/deskripsi">tambah deskripsi</a></span>
                      </div>
                      <div class="form-group">
                        <label for="jumlah" class="mb-2 font-weight-bold">Biaya</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="ov_biaya" id="ov_biaya">
                      </div>
                      <button class="w-100 btn btn-primary btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="handleOverheadPabrik()">Simpan Data</button>
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
      </div>
      {{-- <div class="col-2 pl-4 pr-4 pt-4 mb-3" style="text-align: right">
        <button type="button" class="btn btn-primary" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button>
      </div>  --}}
  </div>
</div>
@endsection
@section('script')
  <script type="text/javascript">
    var tableupah = []

    function ubahPanjang(){
      var panjang = $('#panjang').val()
      $('.p').html(panjang)
    }

    function ubahLebar(){
      var lebar = $('#lebar').val()
      $('.l').html(lebar)
    }

    function ubahTinggi(){
      var tinggi = $('#tinggi').val()
      $('.t').html(tinggi)
    }

    

    function ubahDeskripsi(){
      var upah = $('#deskripsi').val()
      $('.deskripsi').html(upah)
    }
    

  </script>
  <script>
    $(document).ready(function() {
        bacaTenagaKerja(0)
        bacaOverheadPabrik(0)
        bacaBahanBaku(0)
    });
    //Field Tenaga Kerja
    function bacaTenagaKerja(id) {
        $.get("{{ url('/karyawan/produksi') }}/"+ id, {}, function(data, status) {
            $("#tenagaKerjaId").html(data);
        });
    }
    function handleTenagaKerja(){
        var id_produksi = $('#id_produksi').val()
        var id_karyawan = $("#id_karyawan").val()
        var upah = $("#upah").val()
        console.log(upah)
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/karyawan/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_produksi": id_produksi,
                "id_karyawan": id_karyawan,
                "upah": upah
            },
            success: function(data) {
                bacaTenagaKerja(data)
                console.log(data)
            }
        });
    }
    //Field Tenaga Kerja
    function bacaOverheadPabrik(id) {
        $.get("{{ url('/overhead/produksi') }}/"+ id, {}, function(data, status) {
            $("#overheadId").html(data);
        });
    }
    function handleOverheadPabrik(){
        var id_produksi = $('#id_produksi').val()
        var ov_deskripsi = $("#ov_deskripsi").val()
        var ov_biaya = $("#ov_biaya").val()
        console.log(ov_deskripsi,ov_biaya)
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/overhead/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_produksi": id_produksi,
                "ov_deskripsi": ov_deskripsi,
                "ov_biaya": ov_biaya
            },
            success: function(data) {
                bacaOverheadPabrik(data)
                console.log(data)
            }
        });
    }

    //insert data header
    function store() {
        var nama_barang_produksi = $("#nama_barang_produksi").val();
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "nama_barang_produksi": nama_barang_produksi
            },
            success: function(data) {
                $("#id_produksi").val(data)
                console.log(data)
                if(data){
                    swal({
                        title: "Sukses",
                        text: "Produksi dibuat!",
                        icon: "success",
                        button: "Close!",
                    });
                }
            }
        });
    }

    function bacaBahanBaku(id) {
        $.get("{{ url('bahanbaku/produksi') }}/"+ id, {}, function(data, status) {
            $("#bahanBakuId").html(data);
        });
    }
    function handleProduksiBaku(){
        var panjang = $('#bb_panjang').val()
        var lebar = $("#bb_lebar").val()
        var tinggi = $("#bb_tinggi").val()
        var id_produksi = $("#id_produksi").val()
        console.log(panjang, lebar, tinggi, id_produksi)
        $.ajax({
            type: "post",
            url: "{{ url('/update/bahanbaku/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_produksi": id_produksi,
                "panjang": panjang,
                "lebar": lebar,
                "tinggi": tinggi
            },
            success: function(data) {
                bacaBahanBaku(data)
                console.log(data)
            }
        });
    }

    function handleSetData(){
        var id_produksi = $("#id_produksi").val()

        var karton_at = $('#karton_at').val()
        var karton_skl = $('#karton_skl').val()
        var karton_skd = $('#karton_skd').val()
        var kertaskotak_adl = $('#kertaskotak_adl').val()
        var kertaskotak_sd = $('#kertaskotak_sd').val()
        var kertaskotak_sl = $('#kertaskotak_sl').val()
        var kertasluar_dk = $('#kertasluar_dk').val()
        var kertasluar_lk = $('#kertasluar_lk').val()
        var kertasluar_sd = $('#kertasluar_sd').val()
        var kertasluar_sl = $('#kertasluar_sl').val()
        $.ajax({
            type: "post",
            url: "{{ url('/update/bahanbakudetail/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id_produksi": id_produksi,
                "karton_at": karton_at,
                "karton_skl": karton_skl,
                "karton_skd": karton_skd,
                "kertaskotak_adl": kertaskotak_adl,
                "kertaskotak_sd": kertaskotak_sd,
                "kertaskotak_sl": kertaskotak_sl,
                "kertasluar_dk": kertasluar_dk,
                "kertasluar_lk": kertasluar_lk,
                "kertasluar_sd": kertasluar_sd,
                "kertasluar_sl": kertasluar_sl,
            },
            success: function(data) {
                bacaBahanBaku(data)
                console.log(data)
            }
        });
    }

  </script>
@endsection