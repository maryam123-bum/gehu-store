@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/pembelian">
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
                    <tr style="background-color: #28276A;color:#fff">
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">No. Invoice</th>
                        <th scope="col">Nama Distributor</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$data->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($data as $key) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $key['tgl_pembelian']; ?></td>
                                <td><?php echo $key['id']; ?></td>
                                <td><?php echo $key['nama_pemasok']; ?></td>
                                <td><?php echo $key['jumlah']; ?></td>
                                <td>
                                    <button class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></i></button>
                                    <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </td>
                                </tr>
                        <?php
                        } ?>
                    @else
                    <tr class="text-center font-weight-bold">
                        <td colspan="6">Tidak Ada Data</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>