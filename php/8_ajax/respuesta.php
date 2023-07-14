<?php

$dato = $_POST['dato'];

sleep(2);

echo "Clave: ". $dato;
echo "</br>";
$dato_encriptado = md5($dato);
echo "Clave encriptada en md5: (128bits o 16 pares hexadecimales):<br>" . $dato_encriptado . "<br>";
echo "</br>";
$dato_encriptado = sha1($dato);
echo "Clave encriptada en sha1: (160bits o 20 pares hexadecimales):<br>" . $dato_encriptado . "<br>";
?>