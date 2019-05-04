<?php
    if($_FILES){
        $nombreOriginal = $_FILES["fichero"]["name"];
        $nombreTemporal = $_FILES["fichero"]["tmp_name"];
        $TamanioFichero = $_FILES["fichero"]["size"];
        $TamanioFichero = number_format($TamanioFichero / 1048576,5) ." MB";
        $tipoFichero = $_FILES["fichero"]["type"];
        $aDetalles = pathinfo($nombreOriginal);
        $extension = $aDetalles["extension"];
        $destino = "./archivos/$nombreOriginal";

        
        if(file_exists($destino)){
            $estadoSubida = "<font color='#CC0000'><b>[FALL&Oacute; - El nombre del Archivo ya existe]</b></font>";
        }else{
            if(copy($nombreTemporal,$destino)){
                $estadoSubida = "<font color='#1BC538'><b>[OK]</b></font>";
            }else{
                $estadoSubida = "<font color='#CC0000'><b>[FALL&Oacute;]</b></font>";
            }
        }

    
    
        echo "
        <table style='border-collapse:collapse;width:90%;'>
            <tr>
                <td colspan='2'><h1>[Detalles de la subida]</h1></td>
            </tr>
            <tr>
                <td width='275px'>Nombre Fichero:</td>
                <td><b>[$nombreOriginal]</b></td>
            </tr>
            <tr>
                <td>Nombre Temporal:</td>
                <td><b>[$nombreTemporal]</b></td>
            </tr>
            <tr>
                <td>Tama&ntilde;o del Fichero:</td>
                <td><b>[$TamanioFichero]</b></td>
            </tr>
            <tr>
                <td>Tipo de Fichero:</td>
                <td><b>[$tipoFichero]</b></td>
            </tr>
            <tr>
                <td>Extension:</td>
                <td><b>[$extension]</b></td>
            </tr>
            <tr>
                <td>Ruta Destino:</td>
                <td><b>[$destino]</b></td>
            </tr>
            <tr>
                <td>Estado Subida:</td>
                <td>$estadoSubida</td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                <a href='form_subir.php'>Subir otro Archivo</a>
                </td>
            </tr>
        </table>
        ";
    }
?>
</html>