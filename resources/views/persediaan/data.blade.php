@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <?php if(session('jabatan') == 'Karyawan Administrasi'){ ?>
    <div class="row mb-2">
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
            <a href="#">
                <button class="btn btn-light shadow" style="background-color: #b31966;color:#fff">
                    + Stok Opname
                </button>
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="persediaan">
                <thead>
                <tr style="background-color: #28276A;color:#fff">
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Pokok</th>
                    <?php if(session('jabatan') == 'Karyawan Administrasi'){ ?>
                    <th scope="col">Option</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                    @if (!$data->isEmpty())
                        <?php $no = 1; ?>
                        <?php foreach ($data as $key) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td>BRG-0<?php echo $key['id']; ?></td>
                                <td><?php echo $key['nama_barang']; ?></td>
                                <td><?php echo $key['nama_jenis']; ?></td>
                                <td><?php echo $key['stok'].' '.$key['nama_satuan']; ?></td>
                                <td>Rp. <?php echo $key['harga_pokok'].' per '.$key['nama_satuan']; ?></td>
                                <?php if(session('jabatan') == 'Karyawan Administrasi'){ ?>
                                <td>
                                    <a href="/ubah/persediaan/{{ $key['id'] }}" class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></a>
                                    <a href="/hapus/persediaan{{ $key['id'] }}" class="btn btn-danger" data-bs-toggle="modal"><i class="bi bi-trash3"></i></a>
                                </td>
                                <?php } ?>
                            </tr>
                            <!-- Button trigger modal -->
                
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{ $key['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <h4>Anda ingin menghapus data  {{  $key['nama_barang'] }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/hapus/persediaan" method="post" style="display:inline-block">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $key['id'] }}">
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
</script>
@endsection