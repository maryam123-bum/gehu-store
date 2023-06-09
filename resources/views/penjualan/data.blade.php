@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/penjualan">
                <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                    + Penjualan
                </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="penjualan">
                <thead class="table-primary">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">No. Invoice</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$data->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($data as $key) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $key['tgl_penjualan']; ?></td>
                                <td><?php echo substr_replace("INVPENJ-00",$key['id'],11-strlen($key['id'])); ?></td>
                                <td><?php echo $key['nama_pelanggan']; ?></td>
                                <td><?php echo $key['total']; ?></td>
                                <td>
                                    <a href="/ubah/penjualan/{{ $key['id'] }}">
                                        <button class="btn btn-light shadow" style="background-color: #212290;color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</button>
                                    </a>
                                        {{-- <button class="btn btn-danger"><i class="bi bi-trash3"></i></i></button> --}}
                                </td>
                                </tr>
                        <?php
                        } ?>
                     @else
                        <tr>
                            <td colspan="6" class="text-center font-weight-bold">Tidak Ada Data</td>
                        </tr>
                        
                     @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')

<script>
    let table = new DataTable('#penjualan');
</script>

@endsection