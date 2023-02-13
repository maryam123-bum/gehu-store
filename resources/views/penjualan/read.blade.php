<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    @if ($data)
        <?php $i = 1?>
        @foreach ($data as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item['nama_barang'] }}</td>
            <td>{{ $item['nama_jenis'] }}</td>
            <td>{{ $item['harga_pokok'] }}</td>
            <td>{{ $item['jumlah'] }}</td>
            <td>{{ $item['harga_pokok'] * $item['jumlah'] }}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="font-weight-bold text-center">{{ "No Data" }}</td>
        </tr>
    @endif
</table>