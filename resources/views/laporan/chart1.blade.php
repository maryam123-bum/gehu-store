<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .highcharts-figure,
    .highcharts-data-table table {
      min-width: 310px;
      max-width: 800px;
      margin: 1em auto;
    }
    
    #container {
      height: 400px;
    }
    
    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    
    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }
    
    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }
    
    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
      padding: 0.5em;
    }
    
    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }
    
    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
    </style>
</head>
<body>
  <figure class="highcharts-figure">
    <div id="container"></div>
    
  </figure>
</body>
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
    align: 'left',
    text: 'Laporan Barang'
  },
  subtitle: {
    align: 'left',
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
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    #container {
  height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
    </style>
</head>
<body>
  <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
      Chart showing use of rotated axis labels and data labels. This can be a
      way to include more labels in the chart, but note that more labels can
      sometimes make charts harder to read.
    </p>
  </figure>
</body>
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
    text: 'World\'s largest cities per 2021'
  },
  subtitle: {
    text: 'Source: <a href="https://worldpopulationreview.com/world-cities" target="_blank">World Population Review</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Srok Barang'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Population in 2021: <b>{point.y:1f} millions</b>'
  },
  series: [{
    name: 'Stok Barang',
    data: [
      ['Bahan Baku', 37],
      ['Bahan Penolong', 31],
      ['Barang Jadi', 27]
      
    ],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
</script>
</html> --}}
