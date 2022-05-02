<?php 

require_once 'bd.php';
  
if(isset($_POST['name'])){

    if(isset($_FILES['imagen'])){

     $pathTmp = $_FILES['imagen']['tmp_name'];
    $nombre=$_POST['name'];
    $id = $_POST['id'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];
    $imagen=$_FILES['imagen']['name'];
$uploadPath = "../../assets/img/".$imagen;
$move = move_uploaded_file($pathTmp, $uploadPath);

    $acceso=ConexionBD::dameUnObjetoAcceso();
    $consulta=$acceso->RetornarConsulta("UPDATE productos SET titulo=:nombre,descripcion=:descripcion,precio=:precio,stock=:stock,imagen=:imagen 
    WHERE id = :id");
    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
    $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
    $consulta->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
    $consulta->bindValue(':precio', $precio, PDO::PARAM_STR);
    $consulta->bindValue(':stock', $stock, PDO::PARAM_STR);
    $consulta->bindValue(':imagen', $imagen, PDO::PARAM_STR);
    
    $consulta->execute(); 



return  $consulta;

 }
 $nombre=$_POST['name'];
 $id = $_POST['id'];
 $descripcion=$_POST['descripcion'];
 $precio=$_POST['precio'];
 $stock=$_POST['stock'];

 $acceso=ConexionBD::dameUnObjetoAcceso();
 $consulta=$acceso->RetornarConsulta("UPDATE productos SET titulo=:nombre,descripcion=:descripcion,precio=:precio,stock=:stock 
 WHERE id = :id");
 $consulta->bindValue(':id',$id, PDO::PARAM_INT);
 $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
 $consulta->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
 $consulta->bindValue(':precio', $precio, PDO::PARAM_STR);
 $consulta->bindValue(':stock', $stock, PDO::PARAM_STR);
 
 $consulta->execute(); 
 
 return $consulta;
}

?>
