<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Deskripsi</th>
        <th>Biaya</th>
    </tr>
    @if ($data != [])
        <?php $i = 1?>
        @foreach ($data as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item['deskripsi'] }}</td>
            <td>{{ $item['biaya'] }}</td>
            <td>
                <button id="edit_barang" type="button" class="btn btn-light shadow btn-sm" style="background-color: #212290; color: aliceblue" data-id="{{ $item['id'] }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-pencil-square"  > </i>
                </button>
                <button class="btn btn-danger shadow btn-sm"><i class="bi bi-trash3"></i></button>
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="font-weight-bold text-center">{{ "No Data" }}</td>
        </tr>
    @endif
</table>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <p id="nama_barang">$</p>
                </div>
                <div class="form-group">
                    <label for="jml_barang">Jumlah Barang</label>
                    <input type="text" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>