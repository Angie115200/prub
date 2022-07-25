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
    <script src="view/js/CrudProvee.js"></script>
    
</head>

    
    <form action="">
        <div class = "busq">
            <div class = "b1">
                <h4>Busqueda </h4>
            </div>
            <input type="text" name="" id="" class = "bar">       
        </div>
       
    </form>

    <div class = "container" >
    <h3>CONSULTA PROVEEDOR</h3>
    <div class = "container2"> 

   
    <table>
                    <thead>
                        <tr class = "cabecera">
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>NIT</td>
                            <td>EMPRESA</td>
                            <td>DIRECCION</td>
                            <td>TELEFONO</td>
                            <td class = "op">OPCIONES</td>
                            
                        </tr>
                    </thead>
                    <tbody>  
        <?php 
        
       

        $objControladorProveedor = new ControllerProveedor();
        $listarProovedor = $objControladorProveedor-> ConsultarProveedor();
        
        foreach($listarProovedor as $dato ){?>
                    <tr>
                    <td><?php echo  $dato["COD_PROVEEDOR"]?></td>
                    <td><?php echo  $dato["NOMBRE"]?></td>
                    <td><?php echo  $dato["NIT"]?></td>
                    <td><?php echo  $dato["EMPRESA"]?></td>
                    <td><?php echo  $dato["DIRECCION"]?></td>
                    <td><?php echo  $dato["TELEFONO"]?></td>
                    <td class = "inputs">
                       <a href="javascript:abrir()"  onclick = "ModificarProvee(this.parentElement.parentElement)"><input type="button" value="Modificar" class = "Button" ></a> 
                        <input type="button" value="Eliminar" class = "Button" onclick = "EliminarProvee(this.parentElement.parentElement)">
                        
                    </td>
                    </tr>
                    
                    <?php
                        
        
        ?>
        </div> </div>
            
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
                    $objControladorProveedor = new ControllerProveedor();
                    $objControladorProveedor-> EliminarProveedor();
                }

            ?>

<form action="" method="post" id = "formulario" name = "formulario">
        <div id = "Cerrar"><a href="javascript:cerrar()"><img src="view/img/error.png"></a></div>
        <div class = "containerF">

            <h2>MODIFICAR PROVEEDOR</h2>
            <input type="hidden" name = "codProveedor" id = "codProveedor">

            <div class = "f1">
                <h4>Nombre
                    <input type="text" name="Nombre" id = "Nombre">
                </h4>

                <h4>NIT
                    <input type="text" name="NIT"  id="NIT">
                </h4>

               <h4>
                Empresa
                <input type="text" name = "Empresa" id = "Empresa">
               </h4>

                <h4>
                    Direccion
                    <input type="text" name = "Direccion" id = "Direccion">
                </h4>
                
                <h4>Telefono
                    <input type="number"  name="Telefono" id="Telefono">
                </h4>
               
        </div>
        <input type="submit" value = "Guardar" class = "Guardar">
    </div>
    </form>
      
    <?php
          if(isset($_POST["Nombre"])){
            $objCtrProducto = new ControllerProveedor();
            $objCtrProducto -> ModificarProovedor();
            
            }
    ?>