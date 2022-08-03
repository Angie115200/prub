<link rel="stylesheet" href="view/css/salida.css">
<script src="view/js/crudSal.js"></script>
<form action="" method="post">

    <div class = "container">
       <h2>SALIDA</h2>
        <h3>
            Cantidad Total
            <input type="number" name = "CantTotal" id = "CantTotal" >
        </h3>
        
        <input type="hidden" name = "codSalida" id = "codSalida">
        <input type="hidden" name = "codE" value = "<?php echo $_SESSION['datos']['COD_EMPLEADO'] ?>">
        <a href="javascript:abrir()"><input type="submit" value = "Agregar producto" class = "Guardar"></a>
      

        <?php

            if(isset($_POST["CantTotal"])){
                $CantT = $_POST['CantTotal'];
                $codE = $_POST['codE'];

                $objControllerSalida = new ControllerSalida();
                $objControllerSalida ->  InsertarSalida( $CantT, $codE);
            }
        ?>        
    </div>
    </form>

    <div class = "container2">
        <h2>DETALLE DE SALIDA</h2>
    

    <?php

        if(isset($_POST["CantidadUni"])){
            $CantidadUni = $_POST['CantidadUni'];
            $CodProducto = $_POST['codProducto'];
            $CodSalida = $_POST['codSalida'];
            

    $objControllerSalida = new ControllerSalida();
    $objControllerSalida ->  InsertarDTSalida($CantidadUni, $CodProducto, $CodSalida);
    }
    ?>
    </div>


<div class = "Items" id = "Items" name = "Items">
    <a href="javascript:cerrar()"><img src="view/img/cancelar.png" class = "imagen"></a>
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
                        <a href="javascript:abrirC()" onclick = "IdPro(this.parentElement.parentElement)"><input type="submit" value="Agregar producto"    class = "Button"></a>
                    </td>
                    </tr>
                    
                    <?php
        }
        
        ?>
        </div> </div>
            </tbody>
        </table>
    </div>
   
       
    </div>

    <div>
        
                
    </div>
    <div class = "ContainerC" id = "ContainerC" name = "ContainerC">
        <form method="POST">
            <input type="hidden" name = "codProducto" id = "codProducto" >
            <input type="hidden" value = "35" name = "codSalida">
            <h3>
                Cantidad
                <input type="number" name = "CantidadUni">
            </h3>
        <input type="submit" value="guarda" class = "GuardarDTS">

    </form>
    </div>
        <table>
            <thead>
                <td>COD</td>
            </thead>
            <tbody>
                <?php
            $objControllerSalida = new ControllerSalida();   
            $CodSal = $objControllerSalida-> ConsultarId();
        
            foreach($CodSal as $dato ){?>
                    <tr>
                    <td><?php echo  $dato["COD_SALIDA"]?></td>
                    </tr>
                    
                    <?php
        }?>
            </tbody>
        </table>
       

  
</body>
</html>


</body>
</html>