@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/persediaan">
                <button class="btn btn-success shadow">
                    Tambah
                </button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
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
                                <td><?php echo $key['stok'].' '.$key['nama_satuan'];; ?></td>
                                <td>Rp. <?php echo $key['harga_pokok']; ?></td>
                                <td>
                                    <a href="/ubah/persediaan/{{ $key['id'] }}" class="btn btn-primary">Ubah</a>
                                    <form action="/hapus/persediaan" method="post" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $key['id'] }}" readonly>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    @else
                        <tr class="text-center">
                            <td colspan="7">No Data Found.</td>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection