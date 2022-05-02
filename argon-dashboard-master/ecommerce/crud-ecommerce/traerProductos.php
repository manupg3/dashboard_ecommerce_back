<?php 

require_once '../assets/crud/bd.php';

     
    $acceso = ConexionBD::dameUnObjetoAcceso();
    $consulta = $acceso->RetornarConsulta("SELECT * FROM productos");
    $consulta->execute();
    $arrProductos= $consulta->fetchAll();	


?>