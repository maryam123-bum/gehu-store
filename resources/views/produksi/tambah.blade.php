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
                                <h6><input type="text" name="nama_barang" class="d-inline form-control form-control-sm" width="" id="nama_barang"></h6>
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
                              <th>Harga Karton</th>
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
                  <div id="read">
                      <table class="table table bordered">
                          <tr>
                              <th>Nama Karyawan</th>
                              <th>Upah</th>
                          </tr>
                          <tr>
                              <td class="nama"></td>
                              <td class="upah">0</td>
                          </tr>
                          <tr style="font-weight:bold">
                            <td style="text-align: right">Total</td>
                            <td style="text-align: right">Rp. 0,-</td>
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
                        <label for="barang" class="mb-2 font-weight-bold">Nama Karyawan</label>
                        <select name="karyawan" id="karyawan" class="form-select" >
                            @foreach ($karyawan as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        <span style="font-size: 14px" >Karyawan tidak ada? silahkan <a href="/tambah/karyawan">tambah karyawan</a></span>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="mb-2 font-weight-bold">Upah</label>
                        <input type="text" class="form-control mb-2" placeholder="0" name="upah" id="upah" onchange="ubahUpah()">
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
                    <div id="read">
                        <table class="table table bordered">
                            <tr>
                                <th>Deskripsi Biaya</th>
                                <th>Biaya (Rp)</th>
                            </tr>
                            <tr>
                                <td class="deskripsi"></td>
                                <td class="biaya">0</td>
                            </tr>
                            <tr style="font-weight:bold">
                              <td style="text-align: right">Total</td>
                              <td style="text-align: right">Rp. 0,-</td>
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
    // $(document).ready(function() {
    //     read(0)
    // });

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

    function ubahUpah(){
      var upah = $('#upah').val()
      $('.upah').html(upah)
    }

    function ubahDeskripsi(){
      var upah = $('#deskripsi').val()
      $('.deskripsi').html(upah)
    }

    // Read Database
    // function read(id) {
    //     $.get("{{ url('/read/produksi') }}/"+ id, {}, function(data, status) {
    //         $("#read").html(data);
    //     });
    // }
    // untuk proses create data
    // function store() {
    //     var nama_pemasok = $("#nama_pelanggan").val();
    //     $.ajax({
    //         type: "post",
    //         url: "{{ url('/tambah/penjualan') }}",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "nama_pelanggan": nama_pelanggan
    //         },
    //         success: function(data) {
    //             $("#id_penjualan").val(data.id)
    //         }
    //     });
    // }
    // function insert() {
    //     var id_produksi = $("#id_produksi").val()
    //     var id_barang = $("#barang").val()
    //     var jumlah = $("#jumlah").val()
    //     $.ajax({
    //         type: "post",
    //         url: "{{ url('/tambah/produksi-detail') }}",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "id_penjualan": id_penjualan,
    //             "id_barang": id_barang,
    //             "jumlah": jumlah
    //         },
    //         success: function(data) {
    //             read(data)
    //             console.log(data)
    //         }
    //     });
    // }
    

  </script>
@endsection