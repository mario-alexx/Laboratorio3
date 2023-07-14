<?php 
    require('../../conexionDB.php');
    require('./verificacion.php');
    $respuesta_estado = "";

    if(isset($_POST["dni"])){
        
        try{

            $dsn = "mysql:host=$host;dbname=$dbname"; 
            $dbh = new PDO($dsn, $user, $password);
    
            $dni = $_POST["dni"];
    
            $respuesta_estado = $respuesta_estado . "N° DNI cliente pasado: " . $dni;
    
            $sql = "DELETE FROM clientes WHERE dni=:dni;";
            
            $respuesta_estado = $respuesta_estado . "Conexion exitosa";
    
            $stmt = $dbh->prepare($sql);
            $respuesta_estado = $respuesta_estado . "\nPreparacion exitosa.";
            $stmt->bindParam(':dni', $dni);
            $respuesta_estado = $respuesta_estado . "\nBind exitoso";
            $stmt->execute();
            $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa";
            
            // $dbh = null;
            $respuesta_estado = $respuesta_estado . "\nEl cliente ha sido dado de baja. Vuelva a cargar los datos para ver los cambios";
            echo $respuesta_estado;
            
        }catch (PDOException $e)
        {
            $respuesta_estado = $respuesta_estado . "\nERROR: " . $e->getMessage();
            echo $respuesta_estado;
        }
    }
    else {
        header("Location:./index.php");
    }
?>