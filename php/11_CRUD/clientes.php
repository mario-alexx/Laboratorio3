<?php
    require('../conexionDB.php');

    try{
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password); 

        $orden = $_GET["orden"];
        $filtroDni = $_GET["dni"];
        $filtroNombre = $_GET["nombre"];
        $filtroApellido = $_GET["apellido"];
        $filtroProvincia = $_GET["provincia"];
        $filtroTelefono = $_GET["telefono"];
        $filtroFecha = $_GET["fecha"];

        $sql = "SELECT * FROM clientes WHERE dni LIKE CONCAT('%',:filtroDni,'%') AND nombre LIKE CONCAT('%',:filtroNombre,'%') AND apellido LIKE CONCAT('%',:filtroApellido,'%') AND provincia LIKE CONCAT('%',:filtroProvincia,'%') AND telefono LIKE CONCAT('%',:filtroTelefono,'%') AND fecha LIKE CONCAT('%',:filtroFecha,'%') ORDER BY $orden";        
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':filtroDni', $filtroDni);
        $stmt->bindParam(':filtroNombre', $filtroNombre);
        $stmt->bindParam(':filtroApellido', $filtroApellido);
        $stmt->bindParam(':filtroProvincia', $filtroProvincia);
        $stmt->bindParam(':filtroTelefono', $filtroTelefono);
        $stmt->bindParam(':filtroFecha', $filtroFecha);
       
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $arrayClientes = [];
        $objClientes = new stdClass;

        while($fila = $stmt->fetch()){

            $objCliente = new stdClass;
            $objCliente->dni=$fila["dni"];
            $objCliente->nombre=$fila["nombre"];
            $objCliente->apellido=$fila["apellido"];
            $objCliente->provincia=$fila["provincia"];
            $objCliente->telefono=$fila["telefono"];
            $objCliente->fecha=$fila["fecha"];
            array_push($arrayClientes, $objCliente);
        }

        $dbh = null;
        $objClientes->clientes = $arrayClientes;
        $objClientes->cuenta = count($arrayClientes);
        $jsonClientes = json_encode($objClientes);
        echo $jsonClientes; 

    } catch(PDOException $e){
        echo $e->getMessage();
    }
?>