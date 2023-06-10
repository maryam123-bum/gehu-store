<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Deskripsi</th>
        <th>Biaya</th>
    </tr>
    @if ($data)
        <?php $i = 1?>
        @foreach ($data as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item['deskripsi'] }}</td>
            <td>{{ "Rp. ".$item['biaya'] }}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="font-weight-bold text-center">{{ "No Data" }}</td>
        </tr>
    @endif
</table>