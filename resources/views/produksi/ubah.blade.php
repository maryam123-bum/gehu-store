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
            {{-- <div class="col-2">
              <button class="btn btn-primary" onclick="store()">Buat Transaksi</button>
            </div> --}}
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
                              <h5><span class="badge bg-light" style="color:#000"><?php echo substr_replace("PRO-000",$estimateid,7-strlen($estimateid)); ?></span></h5>
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
                  <div id="read">
                      <table class="table table bordered">
                          <tr>
                              <th>Bahan</th>
                              <th>Posisi</th>
                              <th>P</th>
                              <th>L</th>
                              <th>Jumlah</th>
                              <th>Hasil</th>
                              <th>Harga Satuan</th>
                              <th>Harga Pokok</th>
                          </tr>
                          <tr>
                            <th rowspan="3" style="vertical-align : middle;text-align:center;">Karton</th>
                            <td>Alas & Tutup</td>
                            <td class="p">P</td>
                            <td class="l">L</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Kotak Luar</td>
                            <td class="p">P</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Kotak Dalam</td>
                            <td class="p">P</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <th rowspan="4" style="vertical-align : middle;text-align:center;">Kertas Luar</th>
                            <td>Dalam Kotak</td>
                            <td class="p">P</td>
                            <td class="l">L</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Luar Kotak</td>
                            <td class="p">P</td>
                            <td class="l">L</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Dalam</td>
                            <td class="p">P</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Luar</td>
                            <td class="p">P</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <th rowspan="3" style="vertical-align : middle;text-align:center;">Kertas Kotak</th>
                            <td>Alas dalam luar</td>
                            <td class="p">P</td>
                            <td class="l">L</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Dalam</td>
                            <td class="p">P</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Sisi Luar</td>
                            <td class="p">L</td>
                            <td class="t">T</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr style="font-weight:bold">
                            <td colspan="4"></td>
                            <td colspan="2" style="text-align: right">Total</td>
                            <td colspan="2" style="text-align: right">Rp. 0,-</td>
                          </tr>
                      </table>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-4">
              <div class="card">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Panjang</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="panjang" id="panjang" onchange="ubahPanjang()">
                      </div>
                      <div class="form-group">
                        <label for="harga" class="mb-2 font-weight-bold">Lebar</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="lebar" id="lebar" onchange="ubahLebar()">
                      </div>
                      <div class="form-group">
                        <label for="harga" class="mb-2 font-weight-bold">Tinggi</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="tinggi" id="tinggi" onchange="ubahTinggi()">
                      </div>
                      <button class="w-100 btn btn-light btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="">Input</button>
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
                        <label for="harga" class="mb-2 font-weight-bold">Deskripsi</label>
                        <input type="text" class="form-control mb-2" name="deskripsi" id="deskripsi" onchange="ubahDeskripsi()">
                      </div>
                      <div class="form-group">
                          <label for="harga" class="mb-2 font-weight-bold">Biaya (Rp)</label>
                          <input type="text" class="form-control mb-2" placeholder="0" name="biaya" id="biaya" onchange="ubahUpah()">
                      </div>
                      <button class="w-100 btn btn-light btn-md" style="background-color: #080E7D;color:#fff" type="button" onclick="">Input</button>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-2 pl-4 pr-4 pt-4 mb-3" style="text-align: right">
        <button type="button" class="btn btn-primary" style="background-color: #080E7D;color:#fff" onclick="store()">Buat Transaksi</button>
      </div> 
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
          console.log(data)
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
  </script>
@endsection