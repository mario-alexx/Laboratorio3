<?php
    include('../../conexionDB.php');
    include('./verificacion.php');

    if(isset($_GET["dni"])){
        
        try{
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
    
            $dni = $_GET["dni"];
    
            $sql = "SELECT archivo FROM clientes where dni=:dni"; 
            
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
    
            $fila = $stmt->fetch();
            $objClientes = new stdClass;
            $objClientes->documentoPDF = base64_encode($fila["archivo"]);
    
            $salidaJson = json_encode($objClientes, JSON_INVALID_UTF8_SUBSTITUTE);
            echo $salidaJson;
            $dbh = null;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else {
        header("Location:./index.php");
    }
?>