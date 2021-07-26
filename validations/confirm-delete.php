<?php

include('../db.php');
$id = 0;
$query = "delete from usuario where id = $id";
$response = $connection->query($query);
?>