<html>
  <head>
      <title>Ejemplo de Subida de Archivos</title>
      <link rel="stylesheet" href="estilo.css">
      <script src="validaciones.js"></script>
  </head>    
  <form method="post" action="procesar_subir.php" enctype="multipart/form-data" onsubmit="return validar1();" name="f1">
    <table width="50%">    
        <tr>
            <td>
                <h1>Ejemplo de Subida de Archivos</h1>
            </td>
        </tr>            
        <tr>
            <td align="left" valign="top">
                <b>[Seleccione un archivo]</b>
                <input type=file name="fichero" width="250px">
            </td>
        </tr>
        <tr>
            <td align="left">
                <input type="submit" value="Subir Ahora">
                <input type="button" value="Regresar" onclick="location.replace('index.php')">
            </td>
        </tr>        
    </table>
</form>
</html>
