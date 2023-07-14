<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indice ejer de PHP</title>
</head>
<style>
    html{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    .contenedor{
        width: 75%;
        height: 60%;
        border: 1px solid;
        margin: auto;
    }
    h1, p{
        margin-left: 5%;
    }
    .contenedor .lista{
        width: 40%;
        height: 40%;
        margin-left: 5%;
    }
    li {
        background-color:aquamarine;
    }
    li:hover{
        cursor: pointer;
        background-color:cadetblue;
    }
    a{
        text-decoration: none; 
    }
    a:hover{
        color: white;  
    }
</style>
<body>
    <div class="contenedor">
        <h1>*** Indice general ***</h1>
        <p>haga click para abrir una nueva ventana</p>
        <div class="lista">
            <ol>
                <li>
                    <a href="./1_base/index.php">Base</a>
                </li>
                <li>
                    <a href="./2_include/index.php">Include</a>
                </li>
                <li>
                    <a href="./3_requiere/index.php">Requiere</a>
                </li>
                <li>
                    <a href="./4_varServer/index.php">Variables Server</a>
                </li>
                <li>
                    <a href="./5_varObj/index.php">Variable Objeto</a>
                </li>
                <li>
                    <a href="./6_formulario/index.html">Formulario</a>
                </li>
                <li>
                    <a href="./7_formEncryp/index.php">Formulario Encriptado</a>
                </li>
                <li>
                    <a href="./8_ajax/index.html">Ajax</a>
                </li>
                <li>
                    <a href="./9_formJSON/index.html">Formulario JSON</a>
                </li>
                <li>
                    <a href="./10_TablaDB/index.html">DB Ordena-Lista-Filtra</a>
                </li>
                <li>
                    <a href="./11_CRUD/index.html">DB CRUD</a>
                </li>
                <li>
                    <a href="./12_session/formularioRegistro.html">Sesion</a>
                </li>
            </ol>
        </div>
</body>
</html> 