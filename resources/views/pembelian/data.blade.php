@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <?php if(session('jabatan') == $access){ ?>
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/pembelian">
                <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                    + Pembelian
                </button>
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="pembelian">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Invoice</th>
                        <th scope="col">Nama Distributor</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Harga</th>
                    <?php if(session('jabatan') == $access){ ?>
                        <th scope="col" class="text-center">Opsi</th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    @if (!$data->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($data as $item) { ?>
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ substr_replace("INVPEMB-000",$item->id,11-strlen($item->id)) }}</td>
                                <td>{{ $item->nama_pemasok }}</td>
                                <td>{{ $item->tgl_pembelian }}</td>
                                <td>{{ "Rp. ".$item->total }}</td>
                                <?php if(session('jabatan') == $access){ ?>
                                    <td class="text-center">
                                        <a href="/ubah/pembelian/{{ $item->id }}">
                                            <button class="btn shadow" style="background-color: #212290; color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</button>
                                        </a>
                                            <button class="btn btn-danger"><i class="bi bi-trash3"></i> Hapus</button>
                                    </td>
                                <?php } ?>
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
@section('script')

<script>
    let table = new DataTable('#pembelian');
</script>
    
@endsection