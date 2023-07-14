<?php

    echo "<h4>En este ejemplo se utiliza la función include() que ubica código php definido en el archivo ejemplo2.inc:</h4>";
    echo "<h4>Antes de insertar el include las variables declaradas en el mismo no existen. <br>
    Las variables son:</h4>";

    echo $array1;
    echo $array1;
    echo $array2;
    echo $array2;
    echo $array1;
    
    include("./malo.inc");
    include("./ejemplo2.inc");

    echo "<h4>Aquí ya se ejecutó la función include(). Cuando se usa include ocurre que si el archivo '.inc' no existe, se visualiza un warning y el script sigue ejecutándose hasta el final.</h4>";
    echo "<h4>Las 2 variables de tipo array asociativo en el .inc son: </h4>";
    $arrays = [$array1, $array2];
?>
    <table style="border-collapse: collapse; background-color:darkcyan;">
        <?php 
        foreach($arrays as $fila){
            echo "<tr>";
            foreach($fila as $valor){
                echo "<td style='border: 2px solid purple'>" .  $valor . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>    
<?php
echo "<br>";
echo "<span style='font-weight: bold'>La longitud de los arreglos es : " . count($array1) . "</span>";
?>
