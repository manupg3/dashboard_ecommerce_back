<?php 

require_once 'bd.php';

     
    $acceso = ConexionBD::dameUnObjetoAcceso();
    $consulta = $acceso->RetornarConsulta("SELECT * FROM productos");
    $consulta->execute();
    $arrProductos= $consulta->fetchAll();	

    echo json_encode($arrProductos); 



?>