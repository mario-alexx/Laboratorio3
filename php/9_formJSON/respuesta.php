<?php
    sleep(3);
    $login = new stdClass();
    $login->id = $_POST['id'];
    $login->nombre = $_POST['nombre'];
    $login->apellido = $_POST['apellido'];
    $login->user = $_POST['user'];
    $login->fecha = $_POST['fecha'];

    $miJson = json_encode($login);
    
    echo $miJson;
?>