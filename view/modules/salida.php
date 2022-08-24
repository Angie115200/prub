 <?php

$codigo = 0;
$nombre = "";
$cantidad = 0;
$cantidadTotal = 0;

if(isset($_SESSION['productos'])){
    $productos = $_SESSION['productos'];
}
  
else{
    $productos = array();
}
?>
<link rel="stylesheet" href="view/css/salida.css">
<script src="view/js/Salida.js"></script>


    <form action="" method = "POST" class = "Container">
        <h2 class = "Entrada">SALIDA DE PRODUCTOS</h2>
            <div class = "Container2">
                <label>CODIGO DEL PRODUCTO</label><input type="number" name = "codProducto" placeholder = "Ingrese el codigo del producto">
                <label>CANTIDAD</label><input type="number" name = "cantidad">
                <button value = "Buscar Producto" name = "operacion">
                    <img src="view/img/busqueda.png" class = "op" >
                </button>
            </div>
            
        <table>
            <thead>
                <tr>
                    <td>CODIGO</td>
                    <td>NOMBRE</td>
                    <td>CANTIDAD</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($productos as $a){ ?>
                    <tr>
                        <td><?php echo $a ->COD_PRODUCTO; ?></td>
                        <td><?php echo $a -> NOMBRE;?></td>
                        <td><?php echo $a ->cantidad;?></td>
                    </tr>
                     
                    <?php 
                        $cantidadTotal += ($a->cantidad);
                        ?>
                        <?php
                    }?>
                    <tr><td>CANTIDAD TOTAL</td>
                    <td><?php echo $cantidadTotal; $_SESSION['cantT'] = $cantidadTotal;?></td>
                    </tr>

            </tbody>
        </table>
        <input type="submit"  name = "operacion" value = "GuardarS">
        <input type="submit" value = "Cancelar" name = "operacion">
    </form>
   

    <?php
        if(isset($_POST['operacion'])){
            $operacion = $_REQUEST['operacion'];
            $objDaoSalida = new ModelSalidaI();            
            switch ($operacion){//en caso de q operacion tenga el valor buscar cliente
                case 'Buscar Producto' : $objDaoSalida -> BuscarProducto();//llame la funcion buscar cliente
                break;
                case 'Cancelar' : $objDaoSalida -> Cancelar();//llame la funcion buscar cliente
                break;
                case 'GuardarS' : $objDaoSalida -> GuardarS();//llame la funcion buscar cliente
                break;
    
            }
        }
       
    ?>
    </table>
</body>
</html>


</body>
</html>