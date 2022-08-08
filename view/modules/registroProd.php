<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="stylesheet" href="view/css/registroProd.css">
    <script src="view/js/validarP.js"></script>
</head>

   
    <form action="" method="post" id = "formulario" name = "formulario">
        <div class = "container">

            <h2>REGISTRO PRODUCTO</h2>
            <input type="hidden" name = "cod_producto">

            <div class = "f1">
                <h4>Nombre
                    <input type="text" name="Nombre" id = "NombreP">
                </h4>
                   
            <h4>Referencia
                <input type="text" name="Referencia" id="Referencia">
            </h4>
        </div>
            <div class = "f2">
                <h4>Disponibilidad
                    <input type="number"  name="Disponibilidad" id="Disponibilidad">
                </h4>
        </div>
       

        <input type="submit" value = "Guardar" class = "Guardar" onclick="validarP(event);">
    </div>
    </form>
   
    <?php
                if (isset($_POST["Nombre"])){
                  
                    $Nombre =  $_POST["Nombre"];
                    $Referencia =  $_POST["Referencia"];
                    $Disponibilidad = $_POST["Disponibilidad"];
                    
                    $objCtrProducto = new ControllerProducto();
                    $objCtrProducto -> InsertarProducto ($Nombre, $Referencia, $Disponibilidad);
                }
              ?>
</body>
</html>
