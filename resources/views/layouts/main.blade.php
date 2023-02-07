<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gehu Store</title>
        <!-- bootstrap 5 css -->
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
        <!-- custom css -->
        <!-- <link rel="stylesheet" href="style.css" /> -->
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
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
        </style>
      </head>
    
      <body>
        <div>
          <div class="sidebar active-sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white">Gehu Store</h4>
            <li>
              <a class="text-white" href="/dashboard">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-white" href="/data/karyawan">
                <i class="bi bi-fire mr-2"></i>
                Karyawan
              </a>
            </li>
            <li>
              <a class="text-white" href="/data/persediaan">
                <i class="bi bi-boombox mr-2"></i>
                Persediaan
              </a>
            </li>
            <li>
              <a class="text-white" href="/produksi">
                <i class="bi bi-newspaper mr-2"></i>
                Produksi
              </a>
            </li>
            <li>
              <a class="text-white" href="/pembelian">
                <i class="bi bi-bicycle mr-2"></i>
                Pembelian
              </a>
            </li>
            <li>
              <a class="text-white" href="/penjualan">
                <i class="bi bi-boombox mr-2"></i>
                Penjualan
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-film mr-2"></i>
                Laporan
              </a>
            </li>
          </div>
        </div>
        <div class="p-4 active-main-content" id="main-content">
          @yield('title')
          <div class="container py-5">
            @yield('container')
          </div>
        </div>
      </body>
    </html>