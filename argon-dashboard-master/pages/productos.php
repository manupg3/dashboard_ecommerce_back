<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->  



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="">
  <link rel="icon" type="image/png" href="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="../assets/css/stylesearch.css">
  <link  href="../assets/css/styles-aside.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php include("../../parts/aside.php"); ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include("../../parts/header.php"); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header pb-0">
                    <h6>Productos</h6>
                    <a href="agregarProducto.php" class="add-product-page-products">Nuevo Producto</a>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripcion</th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>
                        <tbody id="table-products">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          

          </div>


  </main>

  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/js/core/popper.min.js"></script>
  <script src="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/js/core/bootstrap.min.js"></script>
  <script src="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
   
   $('#productos').addClass('active'); // for home page

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="https://dashboardphpjs.aios.com.ar/argon-dashboard-master/assets/js/argon-dashboard.min.js?v=2.0.2"></script>
  <script src="../assets/js/crud.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>