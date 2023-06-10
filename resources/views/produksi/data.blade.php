@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
        <div class="row">
            <div class="col-2 mb-2">
                <a href="/tambah/produksi">
                    <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                        + Produksi
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" id="produksi">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col" class="">No</th>
                        <th scope="col">Kode Produksi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Pokok Produksi</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col" class="text-center">Opsi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @if (!$data->isEmpty())
                            <?php $no = 1; ?>
                            <?php foreach ($data as $item) { ?>
                                <tr>
                                    <th scope="row" class="text-center">{{ $no++ }}</th>
                                    <td>{{ "PROD-00".$item->id }}</td>
                                    <td>{{ $item->tgl_produksi }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ "Rp. ".$item->harga_pokok_produksi }}</td>
                                    <td>
                                        {{ "Rp. ".$item->harga_jual }}
                                        <button type="button" class="btn btn-primary btn-sm btnUbahJual" data-hpp={{ $item->harga_pokok_produksi }} data-hj={{ $item->harga_jual }} data-all={{ $item->id }} data-bs-toggle="modal" data-bs-target="#modalHargaJual">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                      <a href="/ubah/produksi/{{ $item->id }}" class="btn btn-light shadow" style="background-color: #212290;color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</a>
                                      <form action="/hapus/produksi/{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        @else
                            <tr>
                                <td colspan="8" class="text-center font-weight-bold">Tidak Ada Data</td>
                            </tr>
                        @endif
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalHargaJual" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modaltitlejabatan">Harga Jual</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" id="form-update-hargajual">
              <input type="hidden" id="id_produksi">
              <div class="mb-3 row">
                <label for="hpp" class="col-sm-5 col-form-label">Harga Pokok Produksi</label>
                <div class="col-sm-7">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" value="0" id="modal_hpp" disabled>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Markup</label>
                <div class="col-sm-7">
                  <div class="input-group mb-3">
                    <input type="number" class="form-control" value="0" id="modal_markup">
                    <span class="input-group-text" id="basic-addon2">%</span>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Harga Jual</label>
                <div class="col-sm-7">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Rp.</span>
                    <input type="text" class="form-control" value="0" id="modal_hargajual" disabled>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
  let table = new DataTable('#produksi');
  $(document).ready(function(){
      $('.btnUbahJual').on('click', function(){
        var id = $(this).data('all')
        var hpp = $(this).data('hpp')
        var hj = $(this).data('hj')
        $('#modal_hpp').val(hpp)
        $('#modal_hargajual').val(hj)
        $('#id_produksi').val(id)
      })
      $('#modal_markup').on('keyup', function(){
        var hpp = parseInt($('#modal_hpp').val())
        var markup = parseInt($(this).val())
        if(markup == isNaN()){
          markup = 0
        }
        
        var result = (hpp*markup/100) + hpp
        $('#modal_hargajual').val(result)
      });
      $('#form-update-hargajual').on('submit', function(event){
        event.preventDefault();  
        var id = $('#id_produksi').val()
        var markup = $('#modal_markup').val()
        $.ajax({
            type: "post",
            url: "{{ url('/update/hargajual/produksi') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id":id,
                "markup":markup
            },
            success: function(data) {
              
                window.location.reload()
            }
        });
      })
  })
  
</script>
@endsection