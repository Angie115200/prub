<?php
$cantidadPE = 0;
$codigoPE = 0;
$nombre = "";
$precioPE = 0;
$precioTotalE = 0;
$cantidadTotalE  = 0;
$productosE = 0;
if(isset($_SESSION['productosE'])){
    $productosE = $_SESSION['productosE'];
}
else{
    $productosE = array();
}

?>
<link rel="stylesheet" href="view/css/salida.css">
<script src="view/js/Salida.js"></script>


    <form action="" method = "POST" class = "Container">
        <h2 class = "Entrada">ENTRADA DE PRODUCTOS</h2>
            <div class = "Container2">
                <label>CODIGO DEL PRODUCTO</label><input type="number" name = "codProducto" placeholder = "Ingrese el codigo del producto">
                <label>CANTIDAD</label><input type="number" name = "cantidad">
                <label>PRECIO</label><input type="number" name = "precio">
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
                    <td>PRECIO</td>
                    <td>SUBTOTAL</td>
                </tr>
            </thead>
            <tbody>
                <?php
                   foreach($productosE as $a){
                ?>
                <tr>
                    <td><?php echo $a->COD_PRODUCTO;?></td>
                    <td><?php echo $a->NOMBRE;?></td>
                    <td><?php echo $a->cantidad;?></td>
                    <td><?php echo $a->precio;?></td>
                    <td><?php echo $a->precio * $a->cantidad;?></td>
                </tr>
                <?php $precioTotalE += ($a->cantidad * $a->precio );
                $cantidadTotalE += ($a->cantidad);//Cree un contador
                } 
                    
                    
                    $_SESSION['cantTE'] = $cantidadTotalE;//Asignele a las sessiones lo que tienen las variables
                    $_SESSION['precioTE'] = $precioTotalE;
                ?>
                 <tr><td>CANTIDAD TOTAL</td>
                    <td><?php echo $cantidadTotalE?></td>
                </tr>
                <tr>
                    <td>PRECIO TOTAL</td>
                    <td><?php echo $precioTotalE?></td>
                </tr>
            </tbody>
        </table>
       
        <?php
             if(isset($_POST['operacion'])){
                $operacion = $_REQUEST['operacion'];
                $objDaoEntrada = new ModelEntradaI();            
                switch ($operacion){//en caso de q operacion tenga el valor buscar cliente
                    case 'Buscar Producto' : $objDaoEntrada -> BuscarProductoE();//llame la funcion buscar cliente?>
                    <script>
                        window.location = "index.php?ruta=Entrada";
                    </script><?php
                    break;
                    case 'Cancelar Entrada' : $objDaoEntrada -> CancelarE();//llame la funcion buscar cliente?>
                    <script>
                        window.location = "index.php?ruta=Entrada";
                    </script><?php
                    break;
                    case 'Guardar Entrada' : $objDaoEntrada -> GuardarE();//llame la funcion buscar cliente?>
                        <script>
                            window.location = "index.php?ruta=Entrada";
                        </script><?php
                    break;
        
                } }
        ?>
         <input type="submit"  name = "operacion" value = "Guardar Entrada" class = "btns">
        <input type="submit" value = "Cancelar Entrada" name = "operacion" class = "btns">
    </form>