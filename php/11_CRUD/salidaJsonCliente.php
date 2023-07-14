<?php
    include('../conexionDB.php');

    try {
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);
    
        $dni = $_GET["dni"];
    
        $sql = "SELECT * FROM clientes WHERE dni=:filtroDni"; // O dni
        $stmt = $dbh->prepare($sql);
    
        $stmt->bindParam(':filtroDni', $dni);
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $fila = $stmt->fetch();
    
        $objCliente = new stdClass;
        $objCliente->dni = $fila["dni"];
        $objCliente->nombre = $fila["nombre"];
        $objCliente->apellido = $fila["apellido"];
        $objCliente->provincia = $fila["provincia"];
        $objCliente->telefono = $fila["telefono"];
        $objCliente->fecha = $fila["fecha"];
    
        $jsonCliente = json_encode($objCliente);
        $dbh = null;
        echo $jsonCliente;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }    

?>