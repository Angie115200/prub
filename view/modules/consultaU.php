<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="stylesheet" href="view/css/consultaU.css">
    <script src="https://kit.fontawesome.com/a4c74380b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/css/sweetalert2.min.css">
    <script src="view/js/sweetalert2.all.min.js"></script>
    <script src="view/js/Crud.js"></script>
</head>
<?php
    require_once "view/modules/header.php"
    

?>
    
    <form action="">
        <div class = "busq">
            <div class = "b1">
                <h4>Busqueda </h4>
            </div>
            <input type="text" name="" id="" class = "bar">       
        </div>
       
    </form>

    <div class = "container" >
    <h3>CONSULTA USUARIO</h3>
    <div class = "container2"> 

   
    <table>
                    <thead>
                        <tr class = "cabecera">
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>APELLIDO</td>
                            <td>CORREO</td>
                            <td>CEDULA</td>
                            <td>TELEFONO</td>
                            <td>ROL</td>
                            <td class = "op">OPCIONES</td>
                            
                        </tr>
                    </thead>
                    <tbody>  
        <?php 
        
       

        $objInsertarEmpleado = new ControllerUsuario();
        $listarProducto = $objInsertarEmpleado-> ConsultarUsuario();
        
        foreach($listarProducto as $dato ){?>
                    <tr>
                    <td><?php echo  $dato["COD_EMPLEADO"]?></td>
                    <td><?php echo  $dato["NOMBRE"]?></td>
                    <td><?php echo  $dato["APELLIDO"]?></td>
                    <td><?php echo  $dato["CORREO"]?></td>
                    <td><?php echo  $dato["CEDULA"]?></td>
                    <td><?php echo  $dato["NUMERO_CONTACTO"]?></td>
                    <td><?php echo  $dato["COD_ROL"]?></td>
                    <td class = "inputs">
                        <input type="button" value="Modificar" class = "Button" onclick = "Modificar(this.parentElement.parentElement)" >
                        <input type="button" value="Eliminar" class = "Button" onclick = "eliminar(this.parentElement.parentElement)">
                        
                    </td>
                    </tr>
                    
                    <?php
                        
                    ?>
                    
                </div>
            
            </div>
            </div>
            </div>
            <?php

        }
        ?> </tbody>
            </table>   
            </div>
            <?php
                if(isset($_GET['elimina'])){
                    $objInsertarEmpleado = new ControllerUsuario();
                    $objInsertarEmpleado->EliminarUsuario();
                }

            ?>

            <form method="POST" name = "FormMdf">


           
            <input type="hidden"  name="codEmpleado" id="codEmpleado">    
            <h3>Nombre
                    <input type="text" class="nmb" name="Nombre" id="Nombre">
            </h3>
            <h3>Apellido
                    <input type="text" class="Apd" name="Apellido" id="Apellido">
            </h3>
            <h3 class = "Correo">Correo
                    <input type="text" class = "correo" name="Correo" id="Correo">
            </h3>

            <h3 class = "Cedula">Cedula
                    <input type="number" class = "ced" name="Cedula" id="Cedula">
            </h3>
            
            <h3 class="nct">Telefono
                    <input type="number" class="conc" name = "Telefono" id = "Telefono">
            </h3>

            <h3 class="cg">Rol
                        <select name="Rol"  class = "rol "id="Rol">
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                   
            </h3>
            <input type="submit" id = "enviar" name = "enviar" value = "ENVIAR">
            </form>

            <?php
                    
                       
                    if(isset($_POST["FormMdf"])){
                        $objInsertarEmpleado = new ControllerUsuario();
                        $objInsertarEmpleado-> ModificarUsuario();
                      }
            ?>
            
           
            
          
</body>
</html>