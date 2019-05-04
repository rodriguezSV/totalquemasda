<html>
    <head>
        <title>Ejemplo de subida de Archivos</title>
        <link rel="stylesheet" href="estilo.css">
        <script src="js/validacion.js"></script>
    </head>
    <?php
        $contenido = "";
        $resultado = "";
        $extension = "";
        $chk1 = " checked ";
        $chk2 = "";
        $nombre = "";

        if($_GET){
            if(isset($_GET["file"])){
                $nombre= base64_decode($_GET["file"]);
                $idEnlace = fopen("./archivos/$nombre","r");
                while(($fila=fgets($idEnlace,1024))){
                    $contenido.=$fila;
                }
                fclose($idEnlace);
            }
        }
        if($_POST){
            $contenido = $_POST["contenido"];
            $nombre = $_POST["nombre"];
            $nombreFichero = $nombre;
            $destino = "./archivos/$nombreFichero";
            $idFichero = fopen($destino,"w");
        if(fwrite($idFichero,$contenido)){
                $estado = "<font color='blue'>[OK]</font>";
                $tamanioFichero = filesize($destino)/1048576;
                $tamanioFichero = number_format($tamanioFichero,5) ."MB";
            }else{
                $estado = "<font color='red'>[FALL&Oacute]: Error de escritura</font>";
                $tamanioFichero = "-";
            }
            fclose($idFichero);
            $resultado = "
            <table style='border-collapse:collapse;width:90%;'>
            <tr><td colspan='4'>[Detalles del archivo]</td></tr>
            <tr>
                <td width='275px'>Nombre Fichero:
                <td><b>[$nombreFichero]</b>
                <td>Tama&ntilde;o del fichero:
                <td><b>[$tamanioFichero]</b>
            </tr>
            <tr>
                <td>Extension:
                <td><b>[$extension]</b>
                <td>Ruta Destino:
                <td><b>[$destino]</b>
            </tr>
            <tr>
                <td>Estado:
                <td colspan='3'>$estado<b> <input type=button value='Menu principal' class='boton'
                onclick=\"location.replace('index.php');\",>
            </tr>
            </table>
            ";
        }
        
        echo"
        <form method=\"post\" action=\"$_SERVER[PHP_SELF]\" onsubmit='validarForm()'>
        <table align='center' width='95%'>
            <tr><td align='center'><h1>Edici&oacute;n de Archivos de Texto</h1></td></tr>
            <tr><td align='left'>Nombre del fichero:
            <input type='text' name='nombre' id='nombre 'value='$nombre' class='caja'></td></tr>
            <span id='msjNombre' name='msjNombre'></span></td>
            <tr>
                <td align='center' valign='top'>
                <textarea name='contenido' class='caja' id='problem_desc'
                style='width:100%;height:250px'>$contenido</textarea>
                    </td>
                </tr>
            <tr>
                <td align='center'>
                    <input type=submit value='Crear Documento' class='boton'>
                    <input type=button value='Cancelar' class='boton'
                    onclick=\"location.replace('index.php');\",>
                </td>
            <tr>
            <tr><td height='20px'></td></tr>
            <tr><td align='center'>$resultado</td></tr>
           
            </table>
         </form>";
    ?>
</html>        