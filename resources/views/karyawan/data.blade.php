@extends('layouts/main')
@section('title')
    <h2>Data {{ $judul }}</h2> 
@endsection
@section('container')
    <?php if(session('jabatan') == $access){ ?>
    <div class="row">
        <div class="col-2 mb-2">
            <a href="/tambah/karyawan">
                <button class="btn btn-light shadow" style="background-color: #2528DC;color:#fff">
                    + Karyawan
                </button>
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="kry">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Karyawan</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <?php if(session('jabatan') == $access){ ?>
                        <th scope="col">OPSI</th>
                        <?php } ?>
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
                            <?php if(session('jabatan') == $access){ ?>
                            <td class="text-center">
                                <a href="/ubah/karyawan/{{ $key['id'] }}" class="btn btn-light shadow" style="background-color: #212290;color: aliceblue"><i class="bi bi-pencil-square"></i> Ubah</a>
                                <a href="#delete{{ $key['id'] }}" data-bs-toggle="modal" class="btn btn-danger" ><i class="bi bi-trash3"></i> Hapus</a>
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
                                            <h4>Anda ingin menghapus data  {{  $key['nama'] }} ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="/hapus/karyawan" method="post" style="display:inline-block">
                                                @csrf
                                                <input type="hidden" id="id" name="id" value="{{ $key['id'] }}">
                                                <button type="submit" class="btn btn-danger">Ya, tentu</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            </td>
                            <?php } ?>
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

@section('script')
<script>
    let table = new DataTable('#kry');
</script>
<script>
    function handleDelete(){
        var id = $('#btnDelete').data('id')
        $('#deleteid').val(id)
    }
    @if (session('success'))
        swal({
            title: "Sukses",
            text: "{{ session('success') }}",
            icon: "success",
            button: "tutup",
        });
    @endif
    @if (session('error'))
        swal({
            title: "Gagal",
            text: "{{ session('error') }}",
            icon: "error",
            button: "tutup",
        });
    @endif
    
</script>
@endsection