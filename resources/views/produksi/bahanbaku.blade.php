<table class="table table bordered">
    <tr>
        <th>Bahan</th>
        <th>Posisi</th>
        <th>P</th>
        <th>L</th>
        <th>Jumlah</th>
        <th>Hasil</th>
        <th>Harga Satuan</th>
        <th>Harga Pokok</th>
    </tr>
    <tr>
      <th rowspan="3" style="vertical-align : middle;text-align:center;">Karton</th>
      <td>Alas & Tutup</td>
      <td class="p">{{ ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" }}</td>
      <td class="l">{{ ($produksibaku && $produksibaku->lebar != 0) ? $produksibaku->lebar : "L" }}</td>
      <td>{{ ($karton) ? $karton->jml_at : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$karton->jml_at : 0 }}</td>
      <td>{{ $hargapokok['karton'] }}</td>
      <td id="1">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$karton->jml_at*$hargapokok['karton'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Kotak Luar</td>
      <td class="p">{{ ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" }}</td>
      <td class="t">{{ ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" }}</td>
      <td>{{ ($karton) ? $karton->jml_skl : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$karton->jml_skl : 0 }}</td>
      <td>{{ $hargapokok['karton'] }}</td>
      <td id="2">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$karton->jml_skl*$hargapokok['karton'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Kotak Dalam</td>
      <td class="p">{{ ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P"}}</td>
      <td class="t">{{ ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" }}</td>
      <td>{{ ($karton) ? $karton->jml_skd : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$karton->jml_skd : 0 }}</td>
      <td>{{ $hargapokok['karton'] }}</td>
      <td id="3">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$karton->jml_skd*$hargapokok['karton'] : 0 }}</td>
    </tr>
    <tr>
      <th rowspan="4" style="vertical-align : middle;text-align:center;">Kertas Luar</th>
      <td>Dalam Kotak</td>
      <td class="p">{{ ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" }}</td>
      <td class="l">{{ ($produksibaku && $produksibaku->lebar != 0) ? $produksibaku->lebar : "L" }}</td>
      <td>{{ ($kertasluar) ? $kertasluar->jml_dk : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertasluar->jml_dk : 0 }}</td>
      <td>{{ $hargapokok['kertas_luar'] }}</td>
      <td id="4">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertasluar->jml_dk*$hargapokok['kertas_luar'] : 0 }}</td>
    </tr>
    <tr>
      <td>Luar Kotak</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" ?></td>
      <td class="l"><?php echo ($produksibaku && $produksibaku->lebar != 0) ? $produksibaku->lebar : "L" ?></td>
      <td>{{ ($kertasluar) ? $kertasluar->jml_lk : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertasluar->jml_lk : 0 }}</td>
      <td>{{ $hargapokok['kertas_luar'] }}</td>
      <td id="5">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertasluar->jml_lk*$hargapokok['kertas_luar'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Dalam</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" ?></td>
      <td class="t"><?php echo ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" ?></td>
      <td>{{ ($kertasluar) ? $kertasluar->jml_sd : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertasluar->jml_sd : 0 }}</td>
      <td>{{ $hargapokok['kertas_luar'] }}</td>
      <td id="6">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertasluar->jml_sd*$hargapokok['kertas_luar'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Luar</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" ?></td>
      <td class="t"><?php echo ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" ?></td>
      <td><?php echo ($kertasluar) ? $kertasluar->jml_sl : "0" ?></td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertasluar->jml_sl : 0 }}</td>
      <td>{{ $hargapokok['kertas_luar'] }}</td>
      <td id="7">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertasluar->jml_sl*$hargapokok['kertas_luar'] : 0 }}</td>
    </tr>
    <tr>
      <th rowspan="3" style="vertical-align : middle;text-align:center;">Kertas Kotak</th>
      <td>Alas dalam luar</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" ?></td>
      <td class="l"><?php echo ($produksibaku && $produksibaku->lebar != 0) ? $produksibaku->lebar : "L" ?></td>
      <td>{{ ($kertaskotak) ? $kertaskotak->jml_adl : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertaskotak->jml_adl : 0 }}</td>
      <td>{{ $hargapokok['kertas_kotak'] }}</td>
      <td id="8">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->lebar*$kertaskotak->jml_adl*$hargapokok['kertas_kotak'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Dalam</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->panjang != 0) ? $produksibaku->panjang : "P" ?></td>
      <td class="t"><?php echo ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" ?></td>
      <td>{{ ($kertaskotak) ? $kertaskotak->jml_sd : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertaskotak->jml_sd : 0 }}</td>
      <td>{{ $hargapokok['kertas_kotak'] }}</td>
      <td id="9">{{ ($produksibaku) ? $produksibaku->panjang*$produksibaku->tinggi*$kertaskotak->jml_sd*$hargapokok['kertas_kotak'] : 0 }}</td>
    </tr>
    <tr>
      <td>Sisi Luar</td>
      <td class="p"><?php echo ($produksibaku && $produksibaku->lebar != 0) ? $produksibaku->lebar : "L" ?></td>
      <td class="t"><?php echo ($produksibaku && $produksibaku->tinggi != 0) ? $produksibaku->tinggi : "T" ?></td>
      <td>{{ ($kertaskotak) ? $kertaskotak->jml_sl : 0 }}</td>
      <td>{{ ($produksibaku) ? $produksibaku->lebar*$produksibaku->tinggi*$kertaskotak->jml_sl : 0 }}</td>
      <td>{{ $hargapokok['kertas_kotak'] }}</td>
      <td id="10">{{ ($produksibaku) ? $produksibaku->lebar*$produksibaku->tinggi*$kertaskotak->jml_sl*$hargapokok['kertas_kotak'] : 0 }}</td>
    </tr>
    <tr style="font-weight:bold">
      <td colspan="4"></td>
      <td colspan="2" style="text-align: right">Total</td>
      <td colspan="2" style="text-align: right">Rp. <p id="total">0</p></td>
    </tr>
</table>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  
  var total = 0;
  
  for (let index = 1; index <= 10; index++) {
    total = total + parseInt($(`#${index}`).html())

  }
  $('#total').html(total);
</script>