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
          text: 'TAHUN 2023'
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
</html>