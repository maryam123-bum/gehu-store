@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row mb-3">
        <div class="col">
            <a href="/tambah/persediaan">
                <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                    + Persediaan
                </button>
            </a>
            <a href="/tambah/jenis">
                <button class="btn btn-light shadow" style="background-color: #d8cc2a;color:#fff">
                    + Jenis
                </button>
            </a>
            <a href="/tambah/satuan">
                <button class="btn btn-light shadow" style="background-color: #19b399;color:#fff">
                    + Satuan
                </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="persediaan">
                <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col" class="text-center">Opsi</th>
                </tr>
                </thead>
                <tbody>
                    @if (!$barang->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($barang as $item) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td>BRG-0<?php echo $item['id']; ?></td>
                                <td><?php echo $item['nama_barang']; ?></td>
                                <td><?php echo $item['nama_jenis']; ?></td>
                                <td><?php echo $item['stok'].' '.$item['nama_satuan']; ?></td>
                                <td>Rp. <?php echo $item['harga_pokok'].' per '.$item['nama_satuan']; ?></td>
                                <td class="text-center">
                                    <a href="/ubah/persediaan/{{ $item['id'] }}" class="btn btn-light shadow" style="background-color: #212290;color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</a>
                                    <a href="#delete{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal"><i class="bi bi-trash3"></i> Hapus</a>
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModelLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Anda ingin menghapus data {{ $item->nama_barang}} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="/hapus/persediaan" method="post" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger">Ya, tentu</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    @else
                            <tr class="text-center font-weight-bold">
                                <td colspan="7">Tidak Ada Data</td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row mt-5 mb-3">
        <div class="col">
            <h3>Barang Jadi</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="barangjadi">
                <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col" class="text-center">Opsi</th>
                </tr>
                </thead>
                <tbody>
                    @if (!$barangjadi->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($barangjadi as $item) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td>BRGPROD-0<?php echo $item['id']; ?></td>
                                <td><?php echo $item['nama_barang']; ?></td>
                                <td><?php echo $item['stok'].' '.$item['nama_satuan']; ?></td>
                                <td>Rp. <?php echo $item['harga_pokok'].' per '.$item['nama_satuan']; ?></td>
                                <td class="text-center">
                                    <a href="/ubah/persediaan/{{ $item['id'] }}" class="btn btn-light shadow" style="background-color: #212290;color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#"><i class="bi bi-trash3"></i> Hapus</a>
                                </td>
                            </tr>
                            
                        <?php
                        } ?>
                    @else
                            <tr class="text-center font-weight-bold">
                                <td colspan="7">Tidak Ada Data</td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
@section('script')

<script>
    @if (session('success'))
        swal({
            title: "Sukses",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Close!",
        });
    @endif
    let table = new DataTable('#persediaan');
    let table2 = new DataTable('#barangjadi');
</script>
@endsection