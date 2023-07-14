<?php

    include("../conexionDB.php");

    if(isset($_POST["user"])){

        try{

            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            
            $user = $_POST["user"];
            $contador = 0;
            $pass = md5($_POST["pass"]);

            $sql = "INSERT INTO usuarios (user, pass, contador) VALUES (:user,:pass, 0);";
            
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":pass", $pass);
            $stmt->execute();
            $dbh = null;
            
            header("Location:./formularioLogin.php");

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }else {
        header("Location:./index.php");
    }

?>