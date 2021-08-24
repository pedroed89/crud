<?php
session_start();

// comprobar las credenciales del usuario
// si las credenciales son corectas

if($_SESSION['login'] === false){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $_SESSION['username'] = $email;
        $_SESSION['login'] = true;
        header('Location: ../index.php');
    }
}else{
    $_SESSION['username'] = 'Invitado';
    $_SESSION['login'] = false;
    header('Location: ../index.php');
}


?>