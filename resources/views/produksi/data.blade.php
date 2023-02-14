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
                <table class="table table-bordered">
                    <thead>
                      <tr style="background-color: #28276A;color:#fff; font-size: 12">
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Biaya Bahan Baku</th>
                        <th scope="col">Biaya Overhead</th>
                        <th scope="col">Biaya Tenaga Kerja</th>
                        <th scope="col">Harga Pokok Produksi</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (!$data->isEmpty())
                            <?php $no = 1; ?>
                            <?php foreach ($data as $key) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $key['tgl_produksi']; ?></td>
                                    <td><?php echo $key['biaya_bahan_baku']; ?></td>
                                    <td><?php echo $key['biaya_overhead']; ?></td>
                                    <td><?php echo $key['biaya_tenaga_kerja']; ?></td>
                                    <td><?php echo $key['biaya_bahan_baku'] + $key['biaya_overhead'] + $key['biaya_tenaga_kerja']; ?></td>
                                    <td><?php echo $key['harga_jual']; ?></td>
                                    <td>
                                        <button class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></i></button>
                                        <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>