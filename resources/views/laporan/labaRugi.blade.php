@extends('layouts/main')
@section('title')
    <h2>LAPORAN</h2> 

@endsection
@section('container')
<div class="card" >
    <div class="card-header" id="editor">
        <button id="cmd" class="btn btn-warning">Download</button>
    </div>
    <div class="card-body" id="content">
        <h3 style="text-align: center">Laporan Laba Rugi Kotor</h3><br>
        <h4 style="text-align: center">Januari 2023</h4><br>
        <div class="row">
            <div class="col">
                <p>Pendapatan</p>
            </div>
        <div class="row">
            <div class="col" style="margin-left: 3%">
                <p>Penjualan</p>
            </div>
            <div class="col" style="margin-left: 3%">
                <p>Rp 3.000.000</p>
            </div>
            <div class="col" style="margin-left: 3%">
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Total Pendapatan</p>
            </div>
            <div class="col">
                <p></p>
            </div>
            <div class="col">
                <p>Rp 3.000.000</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Biaya atas Pendapatan</p>
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin-left: 3%">
                <p>Potongan Pembelian</p>
            </div>
            <div class="col">
                <p>-Rp 1.000.000</p>
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin-left: 3%">
                <p>Biaya pengiriman</p>
            </div>
            <div class="col">
                <p>Rp 150.000</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Total Biaya atas Pendapatan</p>
            </div>
            <div class="col">
                <p></p>
            </div>
            <div class="col">
                <p>-RP 850.000</p>
            </div>
        </div>
        <div class="row">
            <div class="col" style="color: midnightblue">
                <p>Laba/Rugi Kotor</p>
            </div>
            <div class="col">
                <p></p>
            </div>
            <div class="col" style="color: midnightblue">
                <p>RP 2.150.000</p>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript">
    console.log(window)

    // window.jsPDF = window.jspdf.jsPDF;
    $(function() {
        var doc = new jsPDF()
        var specialElementHandlers = {
            '#editor': function (element, renderer){
                return true
            }
        };
        $('#cmd').click(function (){
            console.log(doc)
            doc.addHTML($('#content')[0], function(){
                doc.save('test.pdf')
            })
            // doc.fromHTML(
            //     $('#content').html(), 15, 15,
            //     { 'width': 170, 'elementHandlers': specialElementHandlers
            // })
            // doc.save('sample-pdf')
        })
    })
</script>
@endsection