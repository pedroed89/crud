<?php

$connection = new mysqli("localhost","root","","db");
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}

?>