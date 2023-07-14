
<h2>Variables tipo objeto en PHP. Objeto renglon pedido</h2>

<?php 
    $renglonPedido = new stdClass();

    $renglonPedido->codArt = "CP001";
    $renglonPedido->descripcion = "remera";
    $renglonPedido->precio = 6000;
    $renglonPedido->stock = 23;

    $renglonesPedido = [];

    array_push($renglonesPedido, $renglonPedido);

    echo "<h2 style='color:cadetblue'>\$renglonPedido</h2>";
    foreach ($renglonesPedido as $listaPedido){
        echo "Codigo de articulo: " .$listaPedido->codArt ."<br>" ;  
        echo "Descripcion: ".$listaPedido->descripcion."<br>";  
        echo "Precio: ".$listaPedido->precio."<br>";  
        echo "Stock: ".$listaPedido->stock."<br>";   
    }

    echo "<h2>Tipo de <span style='color:cadetblue'>\$renglonPedido</span>: ".gettype($renglonPedido)."</h2>";
    echo "<hr>";

    echo "<h2>Definamos arreglo de pedidos:</h2>";
    echo "<h2 style='color:cadetblue'>\$renglonesPedido</h2>";
    echo "<h2>Tabula "."<span style='color:cadetblue'>\$renglones de pedido </span>"."Recorrer arreglo de renglones y tabularlos con HTML </h2>";

    $renglonPedido2 = new stdClass();
    $renglonPedido2->codArt = "CP002";
    $renglonPedido2->descripcion = "pantalon";
    $renglonPedido2->precio = 9000;
    $renglonPedido2->stock = 7;

    array_push($renglonesPedido, $renglonPedido2);
    foreach($renglonesPedido as $lista){
        echo "<table><tbody> 
                        <tr> 
                            <td>".$lista->codArt."</td>
                            <td>".$lista->descripcion."</td>
                            <td>".$lista->precio."</td>
                            <td>".$lista->stock."</td>
                        </tr>
                    </tbody>
            </table>";
    }
    echo "<hr>";

    echo "<h2>Producción de un objeto "."<span style='color:cadetblue'>\$renglonesPedido</span>"." con dos atributos array renglonesPedido y cantidad de Renglones</h2>";

    $objRenglonesPedido = new stdClass();

    $objRenglonesPedido->renglonesPedido = $renglonesPedido;
    $objRenglonesPedido->cantRenglones = count($renglonesPedido);

    echo "Cantidad de renglones: " .  $objRenglonesPedido->cantRenglones;
    echo "<hr>";

    echo "<h2>Producción de un JSON jsonRenglones:</h2>";
    $jsonRenglonesPedido = json_encode($objRenglonesPedido);
    echo $jsonRenglonesPedido;
?>