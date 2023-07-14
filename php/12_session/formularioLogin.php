<?php

    session_start();
    if(isset($_SESSION["usuario"])){
        header("Location:./app_BD/index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<style>
        body, html{
            max-height: 100%;
            min-height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        body{
            background-color: grey;
        }
        h1{
            text-align: center;
            color: white;
        }
        #loginForm{
            width: 300px;
            background-color: black;
            color: white;
            display: block;
            margin: 80px auto;
            border-radius: 5px;
            padding: 30px;
            box-sizing: border-box;
        }
        #loginForm input{
            display: block;
            width: 220px;
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }
        .boton{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            margin-top: 15px;
            border: none;
            cursor: pointer;
            background-color: rgb(70, 70, 70);
        }
        .boton:hover{
            background-color: white;
        }
        #loginForm form{
            display: block;
            margin: auto;
        }
        a{
            margin-top: 10px;
            display: block;
            text-align: right;
            padding-right: 20px;
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
        a:hover{
            color: green;
        }
    </style>
<body>
        <h1>Login</h1>

        <div id="loginForm">
            <form method="post" action="./autenticacion.php">
                <label for="user">Usuario: </label>
                <input type="text" id="user" name="user" placeholder="Nombre de usuario" required>
                <label for="pass">Password: </label>
                <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
                <button class="boton">Enviar</button>
                <a href="./formularioRegistro.html">Registrarse</a>
            </form>
        </div>

    </div>
</body>
</html>