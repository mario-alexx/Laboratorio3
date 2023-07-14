 <?php 
    require('../conexionDB.php');
    $respuesta_estado = "";
   
    try{
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);

        $dni = $_POST["dniModif"];
        $nombre = $_POST["nombreModif"];
        $apellido = $_POST["apellidoModif"];
        $provincia = $_POST["provinciaModif"];
        $telefono = $_POST["telefonoModif"];
        $fecha = $_POST["fechaModif"];

        $respuesta_estado = $respuesta_estado . "\n\nconexión exitosa";

        $sql = "UPDATE clientes SET dni=:dni,nombre=:nombre,apellido=:apellido,provincia=:provincia,telefono=:telefono,fecha=:fecha WHERE dni=:dni";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nPreparacion exitosa.";
        
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':provincia', $provincia);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha', $fecha);
        $respuesta_estado =  $respuesta_estado . "\nBind exitoso";

        $stmt->execute();

        if(!isset($_FILES["pdfModif"])){
            $respuesta_estado = $respuesta_estado . "\nNo se inicializo la variable FILES";
        }else {
            if(empty($_FILES["pdfModif"]["name"])){
                $respuesta_estado = $respuesta_estado . "\nNo se eligieron archivos";
            }
            else{
                $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al DNI del cliente $cliente";
                $contenidoPDF = file_get_contents($_FILES["pdfModif"]["tmp_name"]);
                $sql = "UPDATE clientes SET archivo=:contenidoPdf WHERE dni=:dni";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":contenidoPdf", $contenidoPDF);
                $stmt->bindParam(":dni", $dni);
                $stmt->execute();
            }
        }
        $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa";
        $dbh = null;
        $respuesta_estado = $respuesta_estado . "\nSe modifico el cliente. Vuelva a cargar los datos para ver los cambios";
        echo $respuesta_estado;

    } catch (PDOException $e) {
        $respuesta_estado = $respuesta_estado . "\nERROR: " . $e->getMessage();
        echo $respuesta_estado;
    }
?>