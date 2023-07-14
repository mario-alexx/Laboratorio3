<?php 

    echo "<h2>Variables del servidor</h2>";
    echo $_SERVER['SERVER_ADDR']; 
    echo "<br>";
    echo $_SERVER['SERVER_PORT'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['DOCUMENT_ROOT'];

    echo "<h2>Variables del cliente</h2>";
    echo $_SERVER['REMOTE_ADDR']; 
    echo "<br>";
    echo $_SERVER['REMOTE_PORT'];
    echo "<br>";

    echo "<h2>Variables requerimiento</h2>";
    echo $_SERVER['REQUEST_URI']; 
    echo "<br>";
    echo $_SERVER['REQUEST_METHOD'];
    echo "<br>";

    $variables_globales = array_merge($_SERVER, $_GET, $_POST);

    foreach ($variables_globales as $key => $value) {
        echo $key . " => " . $value . "<br>";
    }
?>