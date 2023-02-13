@extends('layouts/main')
@section('title')
    <h2>DASHBOARD</h2> 

@endsection
@section('container')
    <div class="container text-center">
        <div class="row">
          <div class="col-7">
            <div class="card">
              <div class="card-body p-3">
                <figure class="highcharts-figure">
                  <div id="container"></div>
                </figure>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="row mb-3">
              <div class="col">
                <div class="card">
                  <div class="card-body shadow">
                    <div class="row">
                      <div class="col"><h5>5</h5></div>
                    </div>
                    <div class="row">
                      <div class="col"><a href="/data/karyawan"><h5 class="text-primary">Karyawan</h5></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body shadow">
                    <div class="row">
                      <div class="col"><h5>2</h5></div>
                    </div>
                    <div class="row">
                      <div class="col"><a href="/produksi"><h5 class="text-success">Produksi</h5></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-body shadow">
                    <div class="row">
                      <div class="col"><h5>3</h5></div>
                    </div>
                    <div class="row">
                      <div class="col"><a href="/pembelian"><h5 class="text-info">Pembelian</h5></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body shadow">
                    <div class="row">
                      <div class="col"><h5>6</h5></div>
                    </div>
                    <div class="row">
                      <div class="col"><a href="/penjualan"><h5 class="text-danger">Penjualan</h5></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('container', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'DATA KEUANGAN PERUSAHAAN'
        },
        subtitle: {
          text: 'TAHUN 2022'
        },
        xAxis: {
          categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
          ],
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Penghasilan (Rp)'
          }
        },
        tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Rp</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0
          }
        },
        series: [{
          name: 'Penjualan',
          data: [2000000, 2400000, 2100000, 2010000, 1987000, 2300000, 2000000, 2500000, 1900000,
            950000, 1055000, 2800000]
      
        }, {
          name: 'Pembelian',
          data: [240000, 230000, 210000, 200000, 987000, 230000, 200000, 250000, 190000,
            195000, 255000, 300000]
      
        }]
      });
    </script>
@endsection