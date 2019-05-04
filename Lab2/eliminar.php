<?php
    if($_GET){
        if(isset($_GET["file"])){
            $nombre = base64_decode($_GET["file"]);
            $directorioBase = "./archivos"."/".$nombre;;
            if(unlink($directorioBase)){
                echo "
                <script>location.replace('index.php');</script>
                ";
            }else{
                echo "
                <script>alert('Error no se pudo eliminar');location.replace('index.php');</script>
                ";
            }
        }
    }
?>