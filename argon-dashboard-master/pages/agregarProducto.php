<?php
   session_start();
   include('../assets/crud/bd.php') ;
   
   if(isset($_SESSION['user']))
   { 
         
       $userEmail = $_SESSION['user']['email']; 

   }
   else{
   
     header("Location: sign-in.php");
   
   }
     
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.php">
              Dashboard
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.php">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/productos.php">
                  <i class="fas fa-box opacity-6 text-dark me-1"></i>                  
                  Productos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.php">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
              

              
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="http://localhost/argon-dashboard-master/argon-dashboard-master/pages/productos.php" class="btn btn-sm mb-0 me-1 btn-primary">Ver Todos Los Productos</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container container-new-product">
          <div class="row">
            <div class="col-xl-7 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Nuevo Producto</h4>
                  <p class="mb-0"></p>
                </div>
                <div class="card-body">
                  <form role="form" id="formAgregarProducto" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" placeholder="Nombre del Producto" aria-label="Nombre">
                    </div>

                    <div class="mb-3">
                   <textarea name="descripcion"  id="descripcion" name="descripcion" class="form-control form-control-lg" placeholder="Descripcion del Producto" cols="30" rows="10"></textarea>    
                    </div>
                    <div class="mb-3">
                        <input type="file" id="imagen" name="imagen">
                    </div>
                    <div class="mb-3">
                      <input type="text" id="stock" name="stock" class="form-control form-control-lg" placeholder="Stock del Producto" aria-label="Stock">
                    </div>
                    <div class="mb-3">
                      <input type="text" id="precio" name="precio" class="form-control form-control-lg" placeholder="Precio del Producto" aria-label="Precio">
                    </div>
                    
                  
                    <div class="text-center">
                      <button type="submit" id="agregarProducto" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Publicar</button>
                    </div>
                  </form>
                </div>
               
              </div>
            </div>
             <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Ultimos Agregados</h4>
                  <p class="mb-0"></p>
                </div>
                <div class="card-body">
                    <table class="table  table-sm">
                        
                  <tbody id="tb-add-products-list"></tbody>

                    </table>
                    <div class="text-center">
                      <a href="../pages/productos.php" id="ir_a_productos" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Ver Todos Los Productos</a>
                    </div>
                </div>
               
              </div>
            </div>
         
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.2"></script>
  <script src="../assets/js/crud.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>