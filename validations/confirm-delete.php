<?php

include('../db.php');
$id = $_POST['id'];
$query = "delete from usuario where id = $id";
$response = $connection->query($query);

$mensaje = "Se ha eliminado el elemento";

header("location:../index.php");

?>