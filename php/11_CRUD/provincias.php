<?php

require('../conexionDB.php');

try{
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM provincias"; 
    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $arrayProvincias = [];

    while($fila = $stmt->fetch()){
        $objProvincia = new stdClass;
        $objProvincia->id=$fila["id"];
        $objProvincia->nombreProvincia=$fila["provincia"];
        array_push($arrayProvincias, $objProvincia);
    }

    $objProvincias = new stdClass;
    $objProvincias->provincias = $arrayProvincias;

    $jsonProvincias = json_encode($objProvincias);
    echo $jsonProvincias;
    $dbh = null;
    
}catch(PDOException $e){
    echo $e->getMessage();
}
?>