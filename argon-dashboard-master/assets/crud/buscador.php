<?php 

require_once 'bd.php';

   $search = $_POST['search'];
   if(!empty($search)){
   $acceso = ConexionBD::dameUnObjetoAcceso();
   $consulta = $acceso->RetornarConsulta("SELECT * FROM productos WHERE titulo LIKE '$search%'");
   $consulta->execute();
   $arrProductos= $consulta->fetchAll();	

  echo json_encode($arrProductos) ;
}
?>