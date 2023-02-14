@extends('layouts/main')
@section('title')
    <h2>LAPORAN</h2> 

@endsection
@section('container')
<div class="mb-3">
    <button id="cmd" onclick="genPDF()" class="btn btn-warning">Download</button>
</div>
<div class="card" id="content">
    <div class="card-body" >
        <div style="font-size: 14px">
            <div class="row">
                <div class="col">
                    <h3 style="text-align: center">Laporan Laba Rugi Kotor</h3><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4 style="text-align: center">Januari 2023</h4><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Pendapatan</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: 3%">
                    <p>Penjualan</p>
                </div>
                <div class="col-2">
                    <p>Rp 300.000.000</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Total Pendapatan</p>
                </div>
                <div class="col-2">

                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <p>Rp 3.000.000</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Biaya atas Pendapatan</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: 3%">
                    <p>Potongan Pembelian</p>
                </div>
                <div class="col-2">
                    <p>-Rp 1.000.000</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-left: 3%">
                    <p>Biaya pengiriman</p>
                </div>
                <div class="col-2">
                    <p>Rp 150.000</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Total Biaya atas Pendapatan</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p>-Rp 850.000</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row bg-secondary pt-2 text-white">
                <div class="col">
                    <p>Laba/Rugi Kotor</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <p>Rp 850.000</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script src= "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"> </script>
<script type="text/javascript">
    function genPDF(){
        var element = document.getElementById("content");
        html2pdf(element);
    }

    // window.jsPDF = window.jspdf.jsPDF;
    // $(function() {
    //     var doc = new jsPDF()
    //     var specialElementHandlers = {
    //         '#editor': function (element, renderer){
    //             return true
    //         }
    //     };
    //     $('#cmd').click(function (){
    //         console.log(doc)
    //         doc.addHTML($('#content')[0], function(){
    //             doc.save('test.pdf')
    //         })
    //         // doc.fromHTML(
    //         //     $('#content').html(), 15, 15,
    //         //     { 'width': 170, 'elementHandlers': specialElementHandlers
    //         // })
    //         // doc.save('sample-pdf')
    //     })
    // })
</script>
@endsection