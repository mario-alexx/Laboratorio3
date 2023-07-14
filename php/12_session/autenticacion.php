<?php

    if(isset($_POST["user"])){
        include("../conexionDB.php");
        
        try{

            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);

            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $hashedPass = md5($pass);

            $sql = "SELECT * FROM usuarios WHERE user=:user";
            
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':user', $user);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $fila = $stmt->fetchAll();
            $contador = $stmt->rowCount();

            if($contador != 0){

                if($hashedPass == $fila[0]["pass"]){
                    
                    //Actualizo contador de sesión
                    $sql = "UPDATE usuarios SET contador = contador + 1 WHERE user=:user;";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':user', $user);
                    $stmt->execute();
                    session_start();
                    $_SESSION["usuario"] = $user;
                    $_SESSION["identificador"] = session_create_id();
                   
                    header("Location:./app_BD/index.php");
                    $dbh = null;
                    
                    exit();
                }
                else {
                    header("Location:./formularioLogin.php");
                    $dbh = null;
                    exit();
                }
            }
            
            header("Location:./formularioLogin.php");
            $dbh = null;
            exit();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else {
        header("Location:./formularioLogin.php");
        exit();
    }

?>