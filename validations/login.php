<?php
session_start();

// comprobar las credenciales del usuario
// si las credenciales son corectas

if($_SESSION['login'] === false){
    $username = "Admin";
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
}else{
    $_SESSION['username'] = 'Invitado';
    $_SESSION['login'] = false;
}
header('Location: ../index.php');

?>