<?php

include('../db.php');


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
if($id == 0){
    $query =  "INSERT INTO `producto` (`id`, `nombre`, `precio`, `cantidad`, `descripcion`, `categoria`) VALUES (null,'".$nombre."','".$precio."','$cantidad','$descripcion','$categoria')";
}
else{
    //update
    $query = "UPDATE `producto` SET `nombre` = '$nombre',`precio` = '$precio',`cantidad` = '$cantidad',`descripcion` = '$descripcion',`categoria` = '$categoria' WHERE `producto`.`id` = $id";
}

$connection->query($query);
print_r($connection->insert_id);

header("location:../productos.php");

?>