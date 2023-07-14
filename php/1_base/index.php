<?php
    echo "<h3>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php.</h3>";
    echo "<h4>Todo texto y/o html <span style='color:cadetblue'> entregado por el procesador php </span> usando la sentencia echo.</h4>";
    echo "<hr/>";

    $var = "valor1";
    echo "<h4>Sin usar concatenador<span style='color:cadetblue'> \$var =</span> $var</h4>";
    echo "<h4>Usando concatenador<span style='color:cadetblue'> \$var = </span>".$var."</h4>";
    echo "<hr/>";

    $var2 = true;
    echo "<h4>Variable tipo booleana o lógica (verdadero)<span style='color:cadetblue'> \$var2 =</span>".$var2."</h4>" ;
    $var2 = false;
    echo "<h4>Variable tipo booleana o lógica (falso)<span style='color:cadetblue'> \$var2 =</span>".$var2."</h4>";
    echo "<hr/>";

    define("MiConst", "valor constante");
    echo "<h4> <span style='color:cadetblue'>Miconst =</span>".MiConst."</h4>";
    echo "<h4>valor de <span style='color:cadetblue'>Miconst =</span>".gettype(MiConst)."</h4>";
    echo "<hr/>";

    echo "<h3>Arreglos</h3>";
    $arrayP = [];
    $arrayP = ["Hola", "Hello"];
    foreach($arrayP as $i) {
        echo "<h4><span style='color:cadetblue'>\$arrayP = </span>".$i."<h4>";
    }
    echo "<h4>Tipo de <span style='color:cadetblue'>\$arrayP = </span>".gettype($arrayP)."</h4>";

    echo "<h3>Se agregan por programa tres elementos nuevos</h3>";

    array_push($arrayP, "Konichiwa");
    array_push($arrayP, "Privet");
    array_push($arrayP, "Hallo");
    
    echo "<ul>";
    foreach($arrayP as $array){
        echo "<li>".$array."</li>";
    }
    echo "</ul>";

    echo "<hr/>"; 
    echo "<h4>Arreglo de 2 dimensiones (diccionario)</h4>";
    
    $palEsp = ["Hola", "Buenos dias", "Buenas noches","Adios"];
    $palIng = ["Hello", "Good morning", "Good afternoon", "bye"];
    $palJpn = ["Konichiwa", "Ohayo", "Oyasumi", "Sayonara"];
    $palAlm = ["Hallo", "Guten morgen", "Gute nach", "Tschüss"];
    $grupoPalabras = [$palEsp, $palIng, $palJpn, $palAlm];
?>
    <table style="border-collapse: collapse; background-color:darkcyan;"> 
        <thead> 
            <th style="border:2px solid purple">Español</th>
            <th style="border:2px solid purple">Ingles</th>
            <th style="border:2px solid purple">Japones</th>
            <th style="border:2px solid purple">Aleman</th>
        </thead>
        <tbody> 
        <?php 
            foreach($grupoPalabras as $fila) {
                echo "<tr>";
                foreach($fila as $valor){
                    echo "<td style='border:2px solid purple'>" . $valor . "</td>";
                }
                echo "</tr>";
            } 
        ?>
        </tbody>
    </table> 
<?php 
echo "<br>";
    echo "También así se puede expresar el valor de <span style='color: cadetblue'>\$grupoPalabras[2][0]</span>: " .$grupoPalabras[2][0] . "<br>";
    echo "<br>";
    echo "Cantidad de elementos del diccionario: " . count($grupoPalabras) ;
    echo "<hr/>";

    echo "<h4>Variables de tipo arreglo asociativo</h4>";
    $renglonLiq = ["legEmp"=>"c0001", "apellido"=>"Pepe", "salarioBasico"=>25000, "fechaIngr"=>"02/10/2020"];

    echo "<p>Legajo: ".$renglonLiq['legEmp']."</span> <p>";
    echo "<p>Apellido: ".$renglonLiq['apellido']."<p>";
    echo "<p>Salario Basico: ".$renglonLiq['salarioBasico']."<p>";
    echo "<p>Fecha de ingreso: ".$renglonLiq['fechaIngr']."</p>";

    echo "<h4>Cantidad de elementos: ".count($renglonLiq)."</h4>" ;
    echo "<h4>Tipo de dato: ".gettype($renglonLiq)."</h4>" ;
    echo "<hr/>";

    echo "<h3>Expresiones aritméticas</h3>";

    $x = 20;
    $y = 10;

    echo "<p>La variable <span style='color:cadetblue'>\$x</span> tiene el siguiente valor:".$x."</p>";
    echo "<p>La variable <span style='color:cadetblue'>\$y</span> tiene el siguiente valor:".$y."</p>";
    echo "<p>La variable <span style='color:cadetblue'>\$x</span> tiene el siguiente tipo:".gettype($x)."</p>";
    echo "<p>La variable <span style='color:cadetblue'>\$y</span> tiene el siguiente tipo:".gettype($y)."</p>";

    $z = ($x + $y);
    echo "<p>Así se imprime una expresión aritmética, por ejemplo de Suma(adicion):<span style='color:cadetblue'>(\$x + \$y)</span>".$z."</p>";
    $z = $x * $y;
    echo "<p>Así se imprime una expresión aritmética, por ejemplo de Multiplicaion:<span style='color:cadetblue'>\$x * \$y</span>".$z."</p>";
    $z = $x / $y;
    echo "<p>Así se imprime una expresión aritmética, por ejemplo de Division:<span style='color:cadetblue'>\$x \ \$)</span>".$z."</p>";

?>
