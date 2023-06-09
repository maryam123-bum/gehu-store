@extends('layouts/main')

@section('kembali')
  <a href="/laporan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Laporan Laba Rugi</h2>
@endsection

@section('container')
<div class="row mb-1">
    <div class="col-3">
        <label for="month" style="font-weight: bold">Pilih Bulan</label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-2">
        <select name="" id="month" class="form-select">
            <option value="6">Juni</option>
            <option value="7" disabled>Juli</option>
            <option value="8" disabled>Agustus</option>
            <option value="9" disabled>September</option>
            <option value="10" disabled>Oktober</option>
            <option value="11" disabled>November</option>
            <option value="12" disabled>Desember</option>
        </select>
    </div>
    <div class="col-2">
        <select name="" id="year" class="form-select">
            <option value="2023">2023</option>
            <option value="2024" disabled>2024</option>
            <option value="2025" disabled>2025</option>
        </select>
    </div>
    <div class="col-1">
        <button id="cmd" onclick="genPDF()" class="btn btn-warning">Download</button>
    </div>
</div>
<div class="card" id="content">
    <div class="card-body" >
        <div style="font-size: 14px">
            <div class="row mb-3">
                <div class="col-2">
                    <img src="/gambar/logo.jpg" width="80" height="80" alt="">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <h5 style="text-align: center;color:#2596be;font-weight:bold">Gehu Store</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 style="text-align: center">Laporan Laba Rugi</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 style="text-align: center">Juni 2023</h6>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="row mb-1 mt-5">
                <div class="col">
                    <p style="color:#2596be;font-weight:bold">Pendapatan</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Penjualan</p>
                </div>
                <div class="col-2">
                    <p>&nbsp;&nbsp;Rp. {{ $penjualan }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p style="font-weight: bold">Total Pendapatan</p>
                </div>
                <div class="col-2">

                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $penjualan }}</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col">
                    <p style="color:#2596be;font-weight:bold">Biaya atas Pendapatan</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Potongan Pembelian</p>
                </div>
                <div class="col-2">
                    <p>-Rp. {{ -$diskon }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Biaya pengiriman</p>
                </div>
                <div class="col-2 border-bottom border-dark">
                    <p>&nbsp;&nbsp;Rp. {{ $biaya_pengiriman }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5" style="font-weight: bold">Total</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ -$diskon + $biaya_pengiriman }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p style="font-weight: bold">Total Biaya atas Pendapatan</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{-$diskon + $biaya_pengiriman}}</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col">
                    <p style="color:#2596be;font-weight:bold">Pengeluaran Operasional</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Gaji Karyawan</p>
                </div>
                <div class="col-2">
                    <p>Rp. {{ $gaji_karyawan }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Listrik & Air</p>
                </div>
                <div class="col-2 border-bottom border-dark">
                    <p>Rp. {{ $listrik_air }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5" style="font-weight: bold">Total</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $gaji_karyawan + $listrik_air }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5" style="font-weight: bold">Total Biaya Pengeluaran Operasional</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $gaji_karyawan + $listrik_air }}</p>
                </div>
            </div>
            <div class="row bg-secondary pt-2 text-white">
                <div class="col">
                    <p style="font-weight: bold">Laba/Rugi Kotor</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ ($penjualan) - (-$diskon + $biaya_pengiriman) - ($gaji_karyawan + $listrik_air) }} </p>
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