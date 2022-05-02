<?php
session_start();

$_SESSION['prod']['nombre']=$_POST['nombreProd'];
$_SESSION['prod']['descripcion']=$_POST['descripcionProd'];
$_SESSION['prod']['imagen']=$_POST['imagenProd'];
$_SESSION['prod']['stock']=$_POST['stockProd'];
$_SESSION['prod']['precio']=$_POST['precioProd'];

var_dump($_SESSION);

?>