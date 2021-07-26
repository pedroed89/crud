<?php

include('../db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$password_conf = $_POST['password_conf'];


$query =  "INSERT INTO `usuario` (`id`, `nombre`, `mail`, `telefono`, `username`, `password`) VALUES (null,'".$nombre."','".$mail."','$phone','$username','$password')";

$connection->query($query);
print_r($connection->insert_id);

header("location:../index.php");

?>