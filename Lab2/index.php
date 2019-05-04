<html>
    <head>
        <title>Ejemplo de subida de archivos</title>
        <link rel="sytlesheet" href="estilos.css">
    </head>
        <?php
        $filtro="";
        if(isset($_GET["filtro"])){
            $filtro = $_GET["filtro"];
        }
        echo "
        <form method='get' action='$_SERVER[PHP_SELF]'>
        <table align='center' width='95%'>
        <tr>
            <td><h1>[Lista de ficheros]</h1></td>
        </tr>
        <tr>
            <td>
                Buscar Archivo:
                <input type='text' name='filtro' style='height:30px;width:70%;border:solid 2px
                black;' value='$filtro'>
                <input type='submit' value='Buscar'>
            </td>
        </tr>
        <tr>
            <td align='right' height='20px'>
            <a href='form_subir.php'><img src=icono/subir.png></a>
            <a href='crear_archivo.php'><img src=icono/crear.png></a>
        </td>
    </tr>
    <tr>
        <td align='center'>
            <table style='width:100%;border-collapse:collapse;'>
                <tr style='background-color:black;color:white;'>
                    <td align='center'>No.
                    <td width='50%'>Nombre Fichero
                    <td align='center'>Tama&ntilde;o
                    <td align='center'>Opciones
                    <td align='center'>Extension
                </tr>";

    $directorioBase = "./archivos";
    $ico = "";
    if(is_dir($directorioBase)){
        $idDirectorio = opendir($directorioBase);
        $n=0;
        while(($cadaFichero = readdir($idDirectorio))!=false){
            if($cadaFichero!="." && $cadaFichero!=".."){
                $mostrarArchivo = true;
            if($filtro!=""){
                $mostrarArchivo = strpos($cadaFichero,$filtro);
            }
            $extension = substr($cadaFichero, -4);
            if($extension==".txt"){
                $ico = '<img src=icono/txt.png>';
            }

            if($extension=="html"){
                $ico = '<img src=icono/html.png>';
            }

            if($extension==".css"){
                $ico = '<img src=icono/css.png>';
            }

            if($extension=="php"){
                $ico = '<img src=icono/php.png>';
            }

            if($mostrarArchivo==true){
                $n++;
                $encriptado = base64_encode($cadaFichero);
                $tamanioFichero = filesize($directorioBase."/".$cadaFichero)/1048576;
                $tamanioFichero = number_format($tamanioFichero,5) ."MB";
                echo"
                <tr>
                    <td align='center'>$n
                    <td><a href='http://localhost/web08/$directorioBase/$cadaFichero' target='_blank'>$cadaFichero</a>
                    <td align='center'>$tamanioFichero
                    <td align='center'>
                        <a href='eliminar.php?file=$encriptado' class='itemMenu'><img src=icono/eliminar.png></a>
                        <a href='editar.php?file=$encriptado' class='itemMenu'><img src=icono/editar.png></a>
                        <a download='$cadaFichero' href='http://localhost/web08/$directorioBase/$cadaFichero' target='_blank'  class='itemMenu'><img src=icono/descargar.png></a>
                        <a href='renombrar.php?file=$encriptado' class='itemMenu'><img src=icono/renombrar.png></a>
                    </td>
                    <td align='center'>$ico
                </tr>";
            }
        }
    }
    closedir($idDirectorio);
}else{
    echo"
    <tr>
        <td colspan='4' align='center'>No Existe el directorio</td>
    <tr>";
}
echo "</table></td></tr></table>
</form>";

?>
</html>