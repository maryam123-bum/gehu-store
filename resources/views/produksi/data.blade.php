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
                <table class="table table-bordered">
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
                                    <td><?php echo $key['biaya_bahan_baku'] + $key['biaya_overhead'] + $key['biaya_tenaga_kerja']; ?></td>
                                    <td><i class="bi bi-pencil-square"></i><?php echo $key['harga_jual']; ?></td>
                                    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>