
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
                    <a href="javascript:abrir()"  onclick = "Modificar(this.parentElement.parentElement)"><input type="button" value="Modificar" class = "Button" ></a> 
                    <input type="button" value="Eliminar" class = "Button" onclick = "eliminar(this.parentElement.parentElement)">
                        
                        
                    </td>
                    </tr>
                    
           
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

    <form action="" method="post" id = "formulario" name = "formulario">
        <div id = "Cerrar"><a href="javascript:cerrar()"><img src="view/img/error.png"></a></div>
        <div class = "containerF">

            <h2>MODIFICAR PRODUCTO</h2>
            <input type="hidden" name = "codEmpleado" id = "codEmpleado">

            <div class = "f1">
                <h4>Nombre
                    <input type="text" name="Nombre" id = "Nombre">
                </h4>
                   
                <h4>Apellido
                    <input type="text" name="Apellido"  id="Apellido">
                </h4>

                <h4>Contraseña
                    <input type="number"  name="contraseña" id="Contraseña">
                </h4>

                <h4>Contraseña
                    <input type="number"  name="confirmar" id="confirmar">
                </h4>
                <h4>Telefono
                    <input type="number"  name="Telefono" id="Telefono">
                </h4>

                <h4>Cedula
                    <input type="number"  name="Cedula" id="Cedula">
                </h4>

                <h4>
                    Correo
                    <input type="text" name="Correo" id="Correo">
                </h4>
                <h4>Rol
                    <select name="Rol" id="Rol">
                        <option value="1">ADMINISTRADOR</option>
                        <option value="2">EMPLEADO</option>
                    </select>
                </h4>
                
                <input type="submit">
        </div>
  
    </div>
    </form>
   
    </form>
    <?php
                    
                       
                    if(isset($_POST["Nombre"])){
                        $objInsertarEmpleado = new ControllerUsuario();
                        $objInsertarEmpleado-> ModificarUsuario();
                      }
            ?>
        
       
</html>