@extends('layouts/main')

@section('kembali')
  <a href="/laporan"><i class="bi bi-chevron-left fs-2"></i></a>
@endsection

@section('title')
    <h2>Laporan Harga Pokok Produksi</h2>
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
                            <h5 style="text-align: center">Laporan Harga Pokok Produksi</h5>
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
                    <p style="color:#2596be;font-weight:bold">Bahan Baku</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Persediaan Bahan Baku Awal</p>
                </div>
                <div class="col-2">
                    <p>&nbsp;&nbsp;Rp. {{ $data['persediaan_bahan_baku_awal'] }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Pembelian Bahan Baku</p>
                </div>
                <div class="col-2">
                    <p>&nbsp;&nbsp;Rp. {{ $data['pembelian_bahan_baku'] }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-10" style="font-weight: bold">Total Pembelian Bahan Baku</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $data['total_pembelian_bahan_baku'] }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Persediaan Bahan Baku Akhir</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p>Rp. {{ $data['persediaan_bahan_baku_akhir'] }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-10" style="font-weight: bold">Total Biaya Bahan Baku</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $data['total_biaya_bahan_baku'] }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col">
                    <p style="color:#2596be;font-weight:bold">Biaya Tenaga Kerja Langsung</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Tenaga Kerja Langsung</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p>Rp. {{ $data['tenaga_kerja_langsung'] }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col">
                    <p style="color:#2596be;font-weight:bold">Biaya Overhead Pabrik</p>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Biaya Listrik & Air</p>
                </div>
                <div class="col-2">
                    <p>&nbsp;&nbsp;Rp. {{ $data['overhead_deskripsi'] }}</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5">Biaya Pemeliharaan Peralatan</p>
                </div>
                <div class="col-2 border-bottom border-dark">
                    <p>&nbsp;&nbsp;Rp. 0</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <p class="px-5" style="font-weight: bold">Total Biaya Overhead Pabrik</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $data['overhead_deskripsi'] }}</p>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row bg-secondary pt-2 text-white">
                <div class="col">
                    <p style="font-weight: bold">Harga Pokok Produksi</p>
                </div>
                <div class="col-2">
                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <p style="font-weight: bold">Rp. {{ $data['total'] }}</p>
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