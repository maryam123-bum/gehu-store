@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
        <div class="row">
            <div class="col-2 mb-2">
                <a href="/tambah/produksi">
                    <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                        Tambah
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" id="produksi">
                    <thead>
                      <tr style="background-color: #28276A;color:#fff; font-size: 12; text-align:center">
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Harga Pokok Produksi</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Opsi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @if (!$data->isEmpty())
                            <?php $no = 1; ?>
                            <?php foreach ($data as $key) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $key['tgl_produksi']; ?></td>
                                    <td><?php echo "Rp. ".$key['harga_pokok_produksi']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btnEdit" data-id={{ $key }} data-bs-toggle="modal" data-bs-target="#modalHargaJual">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <?php echo $key['harga_jual']; ?>
                                    </td>
                                    <td>
                                      <a href="/ubah/produksi/{{ $key['id'] }}" class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></a>
                                      <a href="/hapus/produksi/{{ $key['id'] }}" class="btn btn-danger" data-bs-toggle="modal"><i class="bi bi-trash3"></i></a>
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
            <form action="">
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
                    <input type="text" class="form-control" value="0" id="modal_markup">
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
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
  let table = new DataTable('#produksi');
  $(document).ready(function(){
      $('.btnEdit').on('click', function(){
        var data = $(this).data('id')
        $('#modal_hpp').val(data.harga_pokok_produksi)
        $('#modal_hargajual').val(data.harga_pokok_produksi)
      })
      $('#modal_markup').on('change', function(){
        var hpp = parseInt($('#modal_hpp').val())
        var markup = parseInt($(this).val())
        var result = (hpp*markup/100) + hpp
        $('#modal_hargajual').val(result)
      });
  })
  
</script>
@endsection