<link rel="stylesheet" href="view/css/movimiento.css">
<script src="view/js/CrudEntrada.js"></script>
<form action="" method="post">

    <div class = "container">
       <h2>ENTRADA</h2>
        <h3 class = "f1">
            Cantidad Total
            <input type="number" name = "CantTotal" id = "CantTotal" >
        </h3>
        
        <h3>
            Fecha de entrada
            <input type="date" name = "fecha" id = "fecha">

        </h3>
        <h3>
            Hora de entrada
            <input type="datetime" name="hora" id="hora">
        </h3>
        <h3>
            Precio total
            <input type="text" name = "PrecioTotal" id = "PrecioTotal"  class = "si">
        </h3>
        <input type="hidden" name = "codE" value = "<?php echo $_SESSION['datos']['COD_EMPLEADO'] ?>">
        
        <a href="javascript:abrir()"><input type="button" value = "Agregar Producto" class = "ag" name = "ag" id = "ag"></a>

      
        
    </div>
   
    </form>
    <?php

        if(isset($_POST["codE"])){
            $codEmpleado = $_POST["codE"];
            $cantidadT = $_POST["CantTotal"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $precioTotal = $_POST["PrecioTotal"];

            $objControllerEntrada = new EntradaController();
            $objControllerEntrada -> InsertarEntrada($codEmpleado, $cantidadT, $fecha, $hora, $precioTotal);
        }
       

    ?>

    <div class = "Items" id = "Items" name = "Items">
    <a href="javascript:cerrarI()"><img src="view/img/cancelar.png" class = "imagen"></a>
        <h2 class= "agregar" >AGREGAR PRODUCTO</h2>
        <table>
            <thead>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>AGREGA</td>
            </thead>
            <tbody>
         <?php   
            $objControladorProducto = new ControllerProducto();
            $listarProducto = $objControladorProducto-> ConsultarProducto();
        
        foreach($listarProducto as $dato ){?>
                    <tr>
                    <td><?php echo  $dato["COD_PRODUCTO"]?></td>
                    <td><?php echo  $dato["NOMBRE"]?></td>
                    <td class = "inputs">
                        <a href="javascript:abrirD()"><input type="button" value="Agregar producto" class = "Button"></a>
                    </td>
                    </tr>
                    
                    <?php
        }
        
        ?>
        </div> </div>
            </tbody>
        </table>
    </div>
    <div class = "Detalle" id = "Detalle">
        <a href="javascript:cerrarD()"><img src="view/img/cancelar.png" class = "imagen"></a>
        <form method="POST">
            <h2 class = "Titulo">DETALLE ENTRADA</h2>
            <input type="number" name = "codProducto" id = "codProducto" value = "3">
            <input type="number" name = "codEntrada" id = "codEntrada" value = "37">
            <input type="number" name = "subtotal" id = "subtotal" value = "2000">
            <h3>
                PRECIO UNITARIO
                <input type="number" name="PrecioUni" id="PrecioUni">
            </h3>
            <h3>
                CANTIDAD
                <input type="number" name="CantidadUni" id="CantidadUni">
            </h3>
           
            <input type="submit" class = "Guardar" id = "Guardar" name = "Guardar">
            <?php
              if(isset($_POST["PrecioUni"])){
            
                $codEntrada = $_POST["codEntrada"];
                $codProducto = $_POST["codProducto"];
                $cantidadUni = $_POST["CantidadUni"];
                $precioUni = $_POST["PrecioUni"];
                $subtotal =  $_POST["subtotal"];
              
    
               
                $objControllerDTEntrada = new DTEntradaController();
                $objControllerDTEntrada -> InsertarDetalleE($codEntrada, $codProducto,  $cantidadUni,$precioUni,$subtotal);
              
    
            }

        ?>
        </form>
       
    </div>

       

  
</body>
</html>