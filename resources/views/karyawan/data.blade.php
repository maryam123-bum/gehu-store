@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/karyawan">
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
                        <th scope="col">ID Karyawan</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                <?php if(!$data->isEmpty()){
                    foreach ($data as $key) { ?>
                        <tr>
                            <th scope="row" class="text-center">{{ $no++ }}</th>
                            <td>KRY-00{{ $key['id'] }}</td>
                            <td>{{ $key['nama'] }}</td>
                            <td>{{ $key['jabatan'] }}</td>
                            <td>
                                @if ($key['jenis_kelamin'] == 'lk')
                                    {{ "Laki-laki" }}
                                @else
                                    {{ "Perempuan" }}
                                @endif
                            </td>
                            <td>{{ $key['alamat'] }}</td>
                            <td class="text-center">
                                <a href="/ubah/karyawan/{{ $key['id'] }}" class="btn btn-light shadow" style="background-color: #212290"><i class="bi bi-pencil-square"  style="color: aliceblue"></i></a>
                                <form action="/hapus/karyawan" method="post" style="display:inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $key['id'] }}" readonly>
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } 
                } else{ ?>
                    <tr class="text-center font-weight-bold">
                        <td colspan="7">Tidak Ada Data</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection