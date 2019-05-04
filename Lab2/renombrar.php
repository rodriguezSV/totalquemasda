<?php
    $nuevoNombre ="";
    if($_GET){
        if(isset($_GET["file"])){
            $nombre = base64_decode($_GET["file"]);
            $directorioBase = "./archivos"."/".$nombre;
        }
    }
    if($_POST){
        $nuevoNombre = $_POST["nuevoNombre"];
        $nombre = $_POST["nombre"];
        $nombreFichero = $nombre;

    if(rename($nombre, $nuevoNombre)){
        echo "Successfully Renamed";
     }
     else{ 
        echo "Failure";
     }
    
    echo"
        <form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
        <table align='center' width='95%'>
            <tr><td align='center'><h1>Edici&oacute;n de Archivos de Texto</h1></td></tr>

            <tr><td align='center'>Nuevo nombre del fichero:
            <input type='text' name='nuevoNombre' id='nuevoNombre' value='$nuevoNombre' class='caja'></tr>
            <span id='msjnuevoNombre' name='msjnuevoNombre'></span></td>
            
            <td align='center'>
                    <input type=submit value='Crear Documento' class='boton'>
                    <input type=button value='Cancelar' class='boton'
                    onclick=\"location.replace('index.php');\",>
                </td>";
?>