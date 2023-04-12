@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
        <?php if(session('jabatan') == 'Karyawan Administrasi'){ ?>
        <div class="row">
            <div class="col-2 mb-2">
                <a href="/tambah/produksi">
                    <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                        Tambah
                    </button>
                </a>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" id="produksi">
                    <thead>
                      <tr style="background-color: #28276A;color:#fff; font-size: 12; text-align:center">
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Harga Pokok Produksi</th>
                        <th scope="col">Harga Jual</th>
                        
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                          
                                          <!-- Modal -->
                                          <div class="modal fade" id="modaljabatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="modaltitlejabatan">Harga Jual</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="">
                                                    <div class="row">
                                                      <div class="col-sm-12">
                                                        <label for="hargajual" class="form-label">Harga Jual</label>
                                                        <?php echo "Rp. ".$key['harga_pokok_produksi']; ?>
                                                        <div class="invalid-feedback">
                                                          Silahkan isi harga jual.
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-sm-12">
                                                        <label for="markup" class="form-label">Markup</label>
                                                        <input type="text" class="form-control" name="markup" id="markup" placeholder="Masukkan nilai markup" value="" required>%
                                                        <div class="invalid-feedback">
                                                          Silahkan isi nilai markup.
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-sm-12">
                                                        <label for="hargajual" class="form-label">Harga Jual</label>
                                                        <?php echo "Rp. ".$key['harga_jual']; ?>
                                                        <div class="invalid-feedback">
                                                          Silahkan isi harga jual.
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
                                        <?php echo $key['harga_jual']; ?>
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
@endsection
@section('script')
<script>
  let table = new DataTable('#produksi');
</script>
@endsection