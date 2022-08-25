<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="shortcut icon" href="img/LOGITO.png" type="image/x-icon">
    <link rel="stylesheet" href="view/css/registroProov.css">
    <script src="view/js/validacionProov.js"></script>
    <script src="view/js/validacionGLetras.js"></script>
</head>
<?php
        require_once "header.php";
    ?>
    <form method="POST" name="formulario" id="formulario">
        <div class = "Registro">
            <div class="tx">
                <h2>REGISTRO PROVEEDOR</h2>
            </div>
            <div class="f1">
                        

                    <h3>Nombre
                    <input type="text" class="nmb" name="Nombre" id = "Nombre"  onkeypress = "return validarSLetras(event)"  onpaste ="return false">
                    </h3>
                            
                    <h3 class="cnt">NIT
                    <input type="number" name="NIT" id = "NIT">
                    </h3>
                    
                    <h3 class="nct">Telefono
                    <input type="number" name = "Telefono" id = "Telefono">
                    </h3>
                
            </div>
            <div class="f2">
                
                    <h3>Empresa
                    <input type="text" name="Direccion" id = "Empresa"  onkeypress = "return validarSLetras(event)"  onpaste ="return false">
                    </h3>
                    
                    <h3 class="crm">Direccion
                    <input type="text" name="Empresa" id = "Direccion">
                    </h3>
                
                    <h3 class = codProv>
                        <input type="hidden"  name="codProveedor" id="codProveedor">
                    </h3>
                   
                
                    
            </div>
            
            <input type="submit" class ="enviar" value = "Guardar"  onclick="validarProov(event);">
    </div>
   
    </form>
    <?php

        if(isset($_POST["Nombre"])){//Si recepciona por el metodo POST el campo nombre

            $Nombre = $_POST["Nombre"];//Le asignamos a la variable Nombre lo que se envio por el metodo post en el campo Nombre 
            $NIT = $_POST["NIT"];
            $Telefono = $_POST["Telefono"];
            $Empresa = $_POST["Direccion"];
            $Direccion = $_POST["Empresa"];
       


        $objControllerProveedor = new ControllerProveedor();//Llamamos el controlador por medio de un objeto
        $objControllerProveedor -> InsertarProveedor($Nombre, $NIT, $Telefono, $Empresa, $Direccion);//El objeto me trae la funcion insertarProveedor
        }
    ?>
</body>
</html>