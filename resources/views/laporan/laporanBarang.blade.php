@extends('layouts/main')

@section('kembali')
  <a href="/laporan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
  <h2>Laporan Persediaan Barang</h2>
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <figure class="highcharts-figure">
      <div id="container"></div>
    </figure> 
  </div>
</div>
  
@endsection

@section('script')
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




<script>
// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'center',
    text: 'Laporan Barang'
  },
  subtitle: {
    align: 'center',
    text: 'Januari, 2023'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Jumlah Barang'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> of total<br/>'
  },

  series: [
    {
      name: 'Jumlah',
      colorByPoint: true,
      data: [
        {
          name: 'Barang Keluar',
          y: 63,
          drilldown: 'Barang Keluar'
        },
        {
          name: 'Barang Masuk',
          y: 84,
          drilldown: 'Barang Masuk'
        }
      ]
    }
  ],
  drilldown: {
    breadcrumbs: {
      position: {
        align: 'right'
      }
    },
    series: [
      {
        name: 'Barang Keluar',
        id: 'Barang Keluar',
        data: [
          [
            'Bahan Baku',
            30
          ],
          [
            'Bahan Penolong',
            18
          ],
          [
            'Barang Jadi',
            15
          ]
        ]
      },
      {
        name: 'Barang Masuk',
        id: 'Barang Masuk',
        data: [
          [
            'Bahan Baku',
            40
          ],
          [
            'Bahan Penolong',
            24
          ],
          [
            'Barang Jadi',
            20
          ]
        ]
      }
    ]
  }
});
</script>
@endsection