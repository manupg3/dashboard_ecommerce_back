<?php 

require_once 'bd.php';
 
if(isset($_POST['name'])){
    if(isset($_FILES['imagen'])){
     $pathTmp = $_FILES['imagen']['tmp_name'];
    $nombre=$_POST['name'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];
    $imagen=$_FILES['imagen']['name'];
$uploadPath = "../../assets/img/".$imagen;

 $move = move_uploaded_file($pathTmp, $uploadPath);


   $acceso=ConexionBD::dameUnObjetoAcceso();
    $consulta=$acceso->RetornarConsulta("INSERT INTO productos (titulo,descripcion,precio,stock,imagen) 
    value(:titulo,:descripcion,:precio,:stock,:imagen)");
    $consulta->bindValue(":titulo",$nombre);
    $consulta->bindValue(":descripcion",$descripcion);
    $consulta->bindValue(":precio",$precio);
    $consulta->bindValue(":stock",$stock);
    $consulta->bindValue(":imagen",$imagen);
    $consulta->execute(); 

return  $move;
}
 }

?>