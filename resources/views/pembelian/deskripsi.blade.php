<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Deskripsi</th>
        <th>Biaya</th>
        <th>Opsi</th>
    </tr>
    @if ($data)
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
            <td colspan="4" class="font-weight-bold text-center">{{ "No Data" }}</td>
        </tr>
    @endif
</table>