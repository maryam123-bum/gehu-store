@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/persediaan">
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
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col">Option</th>
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
                                <td>
                                    <a href="/ubah/persediaan/{{ $key['id'] }}" class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal"><i class="bi bi-trash3"></i></button>
                                        {{-- <form action="/hapus/persediaan" method="post" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $key['id'] }}" readonly>
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            <!-- Button trigger modal -->
                
                <!-- Modal -->
                <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <h3>Yakin untuk menghapus data ?</h3>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="/hapus/persediaan" method="post" style="display:inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $key['id'] }}" readonly>
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
    
</script>
@endsection