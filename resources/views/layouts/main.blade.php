<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gehu Store</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/icon/bootstrapicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <style>
          li {
            list-style: none;
            margin: 20px 0 20px 0;
          }
    
          a {
            text-decoration: none;
          }
    
          .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
          }
    
          .active-main-content {
            margin-left: 250px;
          }
    
          .active-sidebar {
            margin-left: 0;
          }
    
          #main-content {
            transition: 0.4s;
          }
          .active {
            background-color: #fff;
            color: #fff;
          }
        </style>
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
          <style>
            .highcharts-figure,
            .highcharts-data-table table {
              min-width: 50%;
              max-width: 100%;
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
          <style>
            .active {
              background-color: #5052dc
            }
          </style>
          {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}
      </head>
      <body>
        <div>
          <div class="sidebar active-sidebar" style="background-color:#2E2C44 " id="sidebar">
            {{-- <div class="row">
              <div class="col-4">
                <img src="/gambar/logo.jpg" alt="Logo" object-fit="cover" border-radius=100% overflow="hidden">
              </div>
              <div class="col-8">
                <h4 class="mb-5 text-white p-4">Gehu Store</h4>
              </div>
            </div> --}}
            <h4 class="mb-5 text-white p-4">Gehu Store</h4>
            <li class="px-4 py-2 {{ ($active == "dashboard") ? 'active' : '' }}">
              <a class="text-white" href="/">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <?php if(session('jabatan') == 'Karyawan Administrasi' || (session('jabatan') == 'Direktur') ){ ?>
              <li class="px-4 py-2 {{ ($active == "persediaan") ? 'active' : '' }}">
                <a class="text-white" href="/persediaan">
                  <i class="bi bi-box-seam"></i>
                  Persediaan
                </a>
              </li>
            <?php } ?>
            <?php if(session('jabatan') == 'Karyawan Administrasi' || (session('jabatan') == 'Direktur') ){ ?>
              <li class="px-4 py-2 {{ ($active == "pembelian") ? 'active' : '' }}">
                <a class="text-white" href="/pembelian">
                  <i class="bi bi-cart3"></i>
                  Pembelian
                </a>
              </li>
            <?php }?>
            <?php if(session('jabatan') == 'Karyawan Produksi' || (session('jabatan') == 'Direktur') ){ ?>
              <li class="px-4 py-2 {{ ($active == "produksi") ? 'active' : '' }}">
                <a class="text-white" href="/produksi">
                  <i class="bi bi-hammer"></i>
                  Produksi
                </a>
              </li>
            <?php }?>
            <?php if(session('jabatan') == 'Karyawan Administrasi' || (session('jabatan') == 'Direktur') ){ ?>
              <li class="px-4 py-2 {{ ($active == "penjualan") ? 'active' : '' }}">
                <a class="text-white" href="/penjualan">
                  <i class="bi bi-shop"></i>
                  Penjualan
                </a>
              </li>
            <?php }?>
            <li class="px-4 py-2 {{ ($active == "laporan") ? 'active' : '' }}">
              <a class="text-white" href="/laporan">
                <i class="bi bi-graph-down"></i>
                Laporan
              </a>
            </li>
            <?php if(session('jabatan') == 'Direktur'){ ?>
              <li class="px-4 py-2 {{ ($active == "karyawan") ? 'active' : '' }}">
                <a class="text-white" href="/karyawan">
                  <i class="bi bi-person-square"></i>
                  Karyawan
                </a>
              </li>
            <?php }?>
            <?php if(session('jabatan') == 'Direktur'){ ?>
              <li class="px-4 py-2 {{ ($active == "data-tambahan") ? 'active' : '' }}">
                <a class="text-white" href="/data/access">
                  <i class="bi bi-briefcase"></i>
                  Akses Admin
                </a>
              </li>
            <?php } ?>
          </div>
        </div>
        
        <div class="p-4 active-main-content" id="main-content">
          <header class="p-2 mb-3 border-bottom">
            <div class="d-flex flex-wrap">
              @yield('kembali')
              <a href="" class="d-flex  mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">@yield('title')</span>
              </a>
              <div class="dropdown" style="position:relative;text-align: right">
                <a href="#" class="link-dark text-decoration-none dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{-- <img src="/gambar/foto.png" alt="mdo" width="34" height="34" class="rounded-circle"> --}}
                  {{ session('nama') }}
                </a>
                <ul class="dropdown-menu text-small">
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </header>
          
          <div class="container py-3">
            @yield('container')
          </div>
        </div>
        
      </body>
      <script src="{!! asset('js/jquery.min.js') !!}"></script>
      <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>
      <script src="{!! asset('js/sweetalert.min.js') !!}"></script>
      <script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
      @yield('script')
    </html>