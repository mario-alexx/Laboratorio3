<?php

    include("../../conexionDB.php");
    include("./verificacion.php");

    if(isset($_GET["autenticacion"])){
        
        try{
            
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);

            $user = $_SESSION['usuario'];
            $sql = "SELECT user, contador FROM usuarios WHERE user=:user;";
        
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":user", $user);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $fila = $stmt->fetch();

            $objUsuario = new stdClass;
            $objUsuario->user = $fila["user"];
            $objUsuario->idSesion = $_SESSION["identificador"];
            $objUsuario->contador = $fila["contador"];

            $objJson = json_encode($objUsuario);
            $dbh = null;

            echo $objJson;
        
        } catch(PDOException  $e){
            echo $e->getMessage();
        }
    }
    else {
        header("Location:./index.php");
    }

?>