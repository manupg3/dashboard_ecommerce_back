<?php 

require_once 'bd.php';
  
if(isset($_POST['id'])){

    $id=$_POST['id'];

    $acceso=ConexionBD::dameUnObjetoAcceso();
    $consulta=$acceso->RetornarConsulta("DELETE FROM productos WHERE id = :id");
    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
    $consulta->execute(); 

 }

 return var_dump($_POST);

?>
