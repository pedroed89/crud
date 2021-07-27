<?php

include('../db.php');


$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$password_conf = $_POST['password_conf'];

if($id == 0){
    $query =  "INSERT INTO `usuario` (`id`, `nombre`, `mail`, `telefono`, `username`, `password`) VALUES (null,'".$nombre."','".$mail."','$phone','$username','$password')";
}
else{
    //update
    $query = "UPDATE `usuario` SET `username` = '$username',`nombre` = '$nombre',`telefono` = '$phone',`mail` = '$mail' WHERE `usuario`.`id` = $id";
}

$connection->query($query);
print_r($connection->insert_id);

header("location:../index.php");

?>