@extends('layouts.main')

@section('kembali')
  <a href="/produksi"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

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
                              <h5><span class="badge bg-light" style="color:#000"><?php echo substr_replace("INV-000",$estimateid,7-strlen($estimateid)); ?></span></h5>
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
                                <h6><input type="text" name="nama_barang_produksi" class="d-inline form-control form-control-sm" placeholder="Masukkan Nama Barang" id="nama_barang_produksi"></h6>
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
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_panjang" id="bb_panjang" disabled>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Lebar</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_lebar" id="bb_lebar" disabled>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Tinggi</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="bb_tinggi" id="bb_tinggi" disabled>
                        </div>
                      </div>
                    </div>
                    <button class="w-100 btn btn-md" style="background-color: #27272d;color:#fff" type="button" disabled>Buat Transaksi terlebih dahulu</button>
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
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_at" id="karton_at" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Kotak Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_skl" id="karton_skl" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Kotak Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="karton_skd" id="karton_skd" disabled>
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
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_dk" id="kertasluar_dk" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Luar Kotak</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_lk" id="kertasluar_lk" disabled>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_sd" id="kertasluar_sd" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertasluar_sl" id="kertasluar_sl" disabled>
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
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_adl" id="kertaskotak_adl" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Dalam</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_sd" id="kertaskotak_sd" disabled>
                      </div>
                      <div class="col">
                        <label for="harga" class="mb-2 font-weight-bold" style="font-size: 11px">Sisi Luar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="kertaskotak_sl" id="kertaskotak_sl" disabled>
                      </div>
                    </div> 
                    <button class="w-100 btn btn-md" style="background-color: #27272d;color:#fff" type="button" disabled>Buat Transaksi terlebih dahulu</button>
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
                        <select name="karyawan" id="id_karyawan" class="form-select" disabled>
                            @foreach ($karyawan as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="mb-2 font-weight-bold">Upah</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="upah" id="upah" disabled>
                    </div>
                    <button class="w-100 btn btn-md" style="background-color: #27272d;color:#fff" type="button" disabled>Buat Transaksi terlebih dahulu</button>
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
                        <select name="ov_deskripsi" id="ov_deskripsi" class="form-select" disabled>
                          <option value="" selected>Pilih Deskripsi...</option>
                          @foreach ($deskripsilist as $item)  
                              <option value="{{ $item['id'] }}">{{ $item['deskripsi'] }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah" class="mb-2 font-weight-bold">Biaya</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="ov_biaya" id="ov_biaya" disabled>
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
                        Total : <span id="totalSemua">0</span></p>
                    </h4>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection
@section('script')
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
    
    //Field Tenaga Kerja
    function bacaOverheadPabrik(id) {
        $.get("{{ url('/overhead/produksi') }}/"+ id, {}, function(data, status) {
            $("#overheadId").html(data);
        });
    }

    //insert data header
    function store() {
        var nama_barang_produksi = $('#nama_barang_produksi').val()
        $.ajax({
            type: "post",
            url: "{{ url('/tambah/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "nama_barang_produksi": nama_barang_produksi
            },
            success: function(data) {
                $("#id_produksi").val(data)
                if(data){
                    swal({
                        title: "Sukses",
                        text: "Produksi dibuat!",
                        icon: "success",
                        button: "Close!",
                    });
                }
                window.location.href = '/ubah/produksi/' + data;
            }
        });
    }

    function bacaBahanBaku(id) {
        $.get("{{ url('bahanbaku/produksi') }}/"+ id, {}, function(data, status) {
            $("#bahanBakuId").html(data);
        });
    }

  </script>
@endsection