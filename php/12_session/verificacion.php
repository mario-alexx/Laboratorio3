<?php

    session_start();
    
    if(!isset($_SESSION["usuario"])){
        header("Location:./formularioLogin.php");
        exit();
    }
?>