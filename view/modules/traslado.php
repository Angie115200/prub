<?php
if(isset($_SESSION['bodega'])){
    $codBodega = $_SESSION['bodega']->COD_BODEGA;
    $NombreBodega = $_SESSION['bodega']->NOMBRE; 
}
if(isset($_SESSION['productosT'])){
    $productosT = $_SESSION['productosT'];
}
?>
<link rel="stylesheet" href="view/css/devolucion.css">
<script src="view/js/Salida.js"></script>


    <form action="" method = "POST" class = "Container">
        <h2 class = "Entrada">TRASLADO DE PRODUCTOS</h2>
            <div class = "Container2">
                 <table>

                    <thead>
                    <label>CODIGO DE BODEGA</label><input type="number" name = "codBodega" class = "inputPr">
                    <button value = "Buscar bodega" name = "operacion">
                    <img src="view/img/busqueda.png" class = "op" >
                    </button>
                    <div>
                        
                            <tr>
                                <td>CODIGO DE BODEGA</td>
                                <td>NOMBRE DE BODEGA</td>
                            </tr>
                    </thead>
                    <tbody>
                    <tr class = "prov">
                                <td><?php echo $codBodega?></td>
                                <td><?php echo $NombreBodega?></td>
                            </tr>
                    </tbody>
                    </table>
                    <div class = "Productos">
                <label class = "labelP">CODIGO DEL PRODUCTO</label><input type="number" name = "codProducto" class = "inputP" placeholder = "Ingrese el codigo del producto">
                <label class = "labelP">CANTIDAD</label><input type="number" name = "cantidad" class = "inputP">
                <button value = "Buscar Producto" name = "operacion" class = "proImbtn">
                    <img src="view/img/busqueda.png" class = "proIm" >
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
                    <?php
                    foreach($productosT as $a){
                    ?>
                    <tr>
                        <td><?php echo $a->COD_PRODUCTO;?></td>
                        <td><?php echo $a->NOMBRE;?></td>
                        <td><?php echo $a->cantidad;?></td>
                    </tr>
                
                <?php
                    $cantidadTotal += ($a->cantidad);
                    }
                ?>
                <tr><td>CANTIDAD TOTAL</td>
                    <td><?php echo $cantidadTotal; $_SESSION['cantT'] = $cantidadTotal;?></td>
                    </tr>
                </tbody>
                </table>
            <input type="submit"  name = "operacion" value = "Guardar traslado">
            <input type="submit" value = "Cancelar traslado" name = "operacion">
    </form>
    </div>
            <?php
 if(isset($_POST['operacion'])){
    $operacion = $_REQUEST['operacion'];
    $objDaoTraslado = new ModelTraslado();            
    switch ($operacion){//en caso de q operacion tenga el valor buscar cliente
        case 'Buscar bodega' : $objDaoTraslado -> BuscarBodega();//llame la funcion buscar cliente
        break;
        case 'Buscar Producto' : $objDaoTraslado -> BuscarProductoT();//llame la funcion buscar cliente
        break;
        case 'Cancelar traslado' : $objDaoTraslado -> CancelarTraslado();//llame la funcion buscar cliente
        break;
        case 'Guardar traslado' : $objDaoTraslado -> GuardarTraslado();//llame la funcion buscar cliente
        break;

    } }
            ?>