<?php

    if(isset($_POST['varEncriptar'])){
        $entrada = $_POST['varEncriptar'];
        $claveEncriptada = md5($entrada);
        echo "Clave: " . $entrada . "<br>";
        echo "Clave encriptada en md5: (128bits o 16 pares hexadecimales):<br>" . $claveEncriptada . "<br>";
        echo "Clave: " . $entrada . "<br>";
        $claveEncriptada = sha1($entrada);
        echo "Clave encriptada en sha1: (160bits o 20 pares hexadecimales):<br>" . $claveEncriptada;
    }
    else {
?>

    <html>
        <style>
            .boton {
                cursor: pointer;
                background-color: cadetblue;
                border: 1px solid black;
                color: white;
            }
            .boton:hover{
                background-color:aquamarine;
                color: black;
            }
        </style>

        <form action="./index.php" method="post">
            Ingrese la clave a Encriptar
            <input name="varEncriptar">
            <input class="boton" type="submit" value="Obtener Encriptacion">
        </form>
    </html>
<?php
    }
?>