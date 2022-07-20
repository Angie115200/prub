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
    <script src="view/js/CrudProd.js"></script>
    
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
    <h3>CONSULTA PRODUCTO</h3>
    <div class = "container2"> 

   
    <table>
                    <thead>
                        <tr class = "cabecera">
                            <td>ID</td>
                            <td>NOMBRE DEL PRODUCTO</td>
                            <td>REFERENCIA</td>
                            <td>CANTIDAD</td>
                            <td>DISPONIBILIDAD</td>
                            <td class = "op">OPCIONES</td>
                            
                        </tr>
                    </thead>
                    <tbody>  
        <?php 
        
       

        $objControladorProducto = new ControllerProducto();
        $listarProducto = $objControladorProducto-> ConsultarProducto();
        
        foreach($listarProducto as $dato ){?>
                    <tr>
                    <td><?php echo  $dato["COD_PRODUCTO"]?></td>
                    <td><?php echo  $dato["NOMBRE"]?></td>
                    <td><?php echo  $dato["REFERENCIA"]?></td>
                    <td><?php echo  $dato["CANTIDAD"]?></td>
                    <td><?php echo  $dato["DISPONIBILIDAD"]?></td>
                    <td class = "inputs">
                        <input type="button" value="Modificar" class = "Button" onclick = "ModificarP(this.parentElement.parentElement)" >
                        <input type="button" value="Eliminar" class = "Button" onclick = "EliminarP(this.parentElement.parentElement)">
                        
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
                    $objControladorProducto = new ControllerProducto();
                    $objControladorProducto-> EliminarProducto();
                }

            ?>

<form action="" method="post" id = "formulario" name = "formulario">
        <div class = "container">

            <h2>REGISTRO PRODUCTO</h2>
            <input type="hidden" name = "codProducto" id = "codProducto">

            <div class = "f1">
                <h4>Nombre
                    <input type="text" name="Nombre" id = "NombreP">
                </h4>
                   
            <h4>Referencia
                <input type="text" name="ReferenciaP"  id="ReferenciaP">
            </h4>
        </div>
            <div class = "f2">
                <h4>Cantidad
                    <input type="number"  name="CantidadP" id="CantidadP">
                </h4>

                <h4>Disponibilidad
                    <input type="number"  name="DisponibilidadP" id="DisponibilidadP">
                </h4>
        </div>
       

        <input type="submit" value = "Guardar" class = "Guardar">
    </div>
    </form>