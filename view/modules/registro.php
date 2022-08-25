<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="shortcut icon" href="img/LOGITO.png" type="image/x-icon">
    <link rel="stylesheet" href="view/css/registro.css">
    <script src="view/js/validacionGLetras.js"></script>    
    <script src="view/js/validacion.js"></script>
</head>
<?php
        require_once "header.php";
    ?>
    <form method="POST" name="formulario" id="formulario">
        <div class = "Registro">
            <div class="tx">
                <h2>REGISTRO USUARIO</h2>
            </div>
            <div class="f1">
                    <input type="hidden"  name="codEmpleado" id="codEmpleado">    

                    <h3>Nombre
                    <input type="text" class="nmb" name="Nombre" id = "Nombre" onkeypress = "return validarSLetras(event)"  onpaste ="return false">
                    </h3>
                    
                    
                    <h3 class="cg">Rol
                        <select name="Rol"  class = "rol "id="Rol">
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                   
                    </h3>
                   
                
                
                    <h3 class="cnt">Contraseña
                    <input type="password" class="Ctn" name="Contra" id = "Contra">
                    </h3>
                    
                
            </div>
            <div class="f2">
                
                    <h3>Apellido
                    <input type="text" class="Apd" name="Apellido" id = "Apellido" onkeypress = "return validarSLetras(event)"  onpaste ="return false">
                    </h3>
                    
               
                
                    <h3 class="nct">Telefono
                    <input type="number" class="conc" name = "Telefono" id = "Telefono">
                    </h3>
                
                
                    <h3 class="crm">Contraseña
                    <input type="password" class="pas" name="Confirmacion" id = "Confirma">
                    </h3>
            </div>
            <div class = "f3">
                    <h3>Cedula
                    <input type="number" class = "ced" name="Cedula" id = "Cedula">
                    </h3>
                   
                    <h3 class = "correo">Correo
                    <input type="gmail" class = "correo" name="Correo" id = "Correo">
                    </h3>
                    <h3 class = "oc">
                    <input type="hidden" >
                    </h3>
                
               
            </div>
            <br>
            <input type="submit" class ="enviarR" value = "Guardar"  onclick="validar(event);">
    </div>
   
    </form>
    <?php
    
        if(isset($_POST["Nombre"])){
            
            $Nombre = $_POST["Nombre"];
            $Apellido = $_POST["Apellido"];
            $Cedula = $_POST["Cedula"];
            $Telefono =  $_POST["Telefono"];
            $Correo = $_POST["Correo"];
            $Contra = $_POST["Contra"];
            $Rol = $_POST["Rol"];
           

            $_SESSION['Rol'] = $_REQUEST['Rol'];
            $objInsertarEmpleado = new ControllerUsuario();
            $objInsertarEmpleado-> InsertarUsuario( $Nombre,  $Apellido, $Cedula, $Telefono,  $Correo, $Contra, $Rol);

        }

        

?>
   





</body>
</html>