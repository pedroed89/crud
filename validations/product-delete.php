<?php

include('../db.php');
$id = $_POST['id'];
$query = "delete from producto where id = $id";
$response = $connection->query($query);

$mensaje = "Se ha eliminado el elemento";

header("location:../productos.php");

?>