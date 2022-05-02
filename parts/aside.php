<?php
   session_start();
   include('../argon-dashboard-master/assets/crud/bd.php') ;
   
   if(isset($_SESSION['user']))
   { 
         
       $userEmail = $_SESSION['user']['email']; 

   }
   else{
   
     header("Location: argon-dashboard-master/pages/sign-in.php");
   
   }
     
?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link id="pagestyle" href="argon-dashboard-master/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />

  <link  href="argon-dashboard-master/assets/css/styles-aside.css" rel="stylesheet" />

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="argon-dashboard-master/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " id="dashboard" href="/">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="productos" href="#">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Productos</span>
            </a>
      
            <ul class="dropdowm-aside">  
              <li><a href="argon-dashboard-master/pages/productos.php"><span class="li-float">Todos los productos</span>
</a></li>
              <li><a href="argon-dashboard-master/pages/agregarProducto.php"><span class="li-float">Añadir producto</span>
</a></li>
         </ul> 
        </li>
  
        <li class="nav-item">
          <a class="nav-link " href="argon-dashboard-master/pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Mi Cuenta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../argon-dashboard-master/pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <button class="nav-link button-close" onclick="MostrarConfirmacionLogout();" >
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Cerrar Sesion</span>
  </button>
        </li>
      </ul>
    </div>
  
    </div>
  </aside>
