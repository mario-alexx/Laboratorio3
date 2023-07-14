<?php
    include('../../conexionDB.php');
    include('./verificacion.php');

    $respuesta_estado = "";

    if(isset($_POST["dniAlta"])){
        
        try{
            $dsn = "mysql:host=$host;dbname=$dbname"; 
            $dbh = new PDO($dsn, $user, $password);
        
            $dni = $_POST["dniAlta"];
            $nombre = $_POST["nombreAlta"];
            $apellido = $_POST["apellidoAlta"];
            $provincia = $_POST["provinciaAlta"];
            $telefono = $_POST["telefonoAlta"];
            $fecha = $_POST["fechaAlta"];
            
            $sql = "INSERT INTO clientes (dni, nombre, apellido, provincia, telefono, fecha) VALUES (:dni,:nombre,:apellido,:provincia,:telefono,:fecha);";
            $respuesta_estado = $respuesta_estado . "conexion exitosa Respuesta del servidor al alta. Entradas recibidas en el req http: DNI: " . $dni . " Nombre: " . $nombre . " Apellido: " . $apellido . " Provincia: " . $provincia . " Telefono: " . $telefono . " Fecha: " . $fecha;
    
            $stmt = $dbh->prepare($sql);
            $respuesta_estado = $respuesta_estado . "\nPreparacion exitosa.";
            
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':provincia', $provincia);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':fecha', $fecha);
           
            $respuesta_estado = $respuesta_estado . "\nBind exitoso";
            
            $stmt->execute();
            $respuesta_estado =  $respuesta_estado . "\nEjecucion exitosa";
        
            if(!isset($_FILES["pdfAlta"])){
                $respuesta_estado = $respuesta_estado . "\nNo se inicializo la variable FILES";
            }else {
                if(empty($_FILES["pdfAlta"]["name"])){
                    $respuesta_estado = $respuesta_estado . "\nNo se eligieron archivos";
                }
                else{
                    $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al DNI del cliente $cliente";
                    
                    $contenidoPDF= file_get_contents($_FILES["pdfAlta"]["tmp_name"]);
                    $sql = "UPDATE clientes SET archivo=:contenidoPDF WHERE dni=:dni;";
                    
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(":archivo", $contenidoPDF);
                    $stmt->bindParam(":dni", $dni);
                    $stmt->execute();
                    $respuesta_estado = $respuesta_estado . "\nArchivo cargado";
                }
            }
    
            $respuesta_estado = $respuesta_estado . "\nSe ha dado el alta al cliente. Cargue los datos para ver los cambios";
            echo $respuesta_estado; 
            $dbh = null;
        }
        catch(PDOException $e)
        {
            $respuesta_estado = $respuesta_estado . "\nERROR: " . $e->getMessage();
            echo $respuesta_estado;
        }
    }
    else {
        header("Location:./index.php");
    }
?>