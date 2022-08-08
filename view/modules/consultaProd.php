<link rel="stylesheet" href="view/css/consultaU.css">
    
    
        <div class = "busq">
            <div class = "b1">
                <h3>Busqueda </h4>
            </div>
            <input type="text" name="" id="" class = "bar">       
        </div>


    <div class = "container" >
    <h3>CONSULTA PRODUCTO</h3>
    <div class = "container2"> 

   
    <table>
                    <thead>
                        <tr class = "cabecera">
                            <td>ID</td>
                            <td>NOMBRE DEL PRODUCTO</td>
                            <td>REFERENCIA</td>
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
                    <td><?php echo  $dato["DISPONIBILIDAD"]?></td>
                    <td class = "inputs">
                        <a href="javascript:abrir()" onclick = "ModificarP(this.parentElement.parentElement)"><input type="button" value="Modificar" class = "Button"></a>
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
        <div id = "Cerrar"><a href="javascript:cerrar()"><img src="view/img/error.png"></a></div>
        <div class = "containerF">

            <h2>MODIFICAR PRODUCTO</h2>
            <input type="hidden" name = "codProducto" id = "codProducto">

            <div class = "f1">
                <h4>Nombre
                    <input type="text" name="NombreP" id = "NombreP">
                </h4>
                   
            <h4>Referencia
                <input type="text" name="ReferenciaP"  id="ReferenciaP">
            </h4>


                <h4>Disponibilidad
                    <input type="number"  name="DisponibilidadP" id="DisponibilidadP">
                </h4>
        </div>
       

        <input type="submit" value = "Guardar" class = "Guardar">
    </div>
    </form>

    <?php
    if(isset($_POST["NombreP"])){
    $objCtrProducto = new ControllerProducto();
    $objCtrProducto -> ModificarProducto();
  }

    ?>