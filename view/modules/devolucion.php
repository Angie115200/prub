<?php

$codProve = 0;
$cantidadTotalD = 0;
$NombreProve= "";
$MotD = "";
$Empresa = "";
$productosD = "";

if(isset($_SESSION['proveedor'])){
    $codProve = $_SESSION['proveedor']->COD_PROVEEDOR;
    $NombreProve = $_SESSION['proveedor']->NOMBRE; 
    $Empresa = $_SESSION['proveedor']->EMPRESA; 
   
}

if(isset($_SESSION['productosD'])){
    $productosD = $_SESSION['productosD'];
}


?>

<link rel="stylesheet" href="view/css/devolucion.css">
<script src="view/js/Salida.js"></script>


    <form action="" method = "POST" class = "Container">
        <h2 class = "Entrada">DEVOLUCIONES</h2>
            <div class = "Container2">
               <table>

                    <thead>
                    <label>CODIGO DEL PROVEEDOR</label><input type="number" name = "codProveedor" class = "inputPr">
                    <label>MOTIVO DE DEVOLUCION</label><input type="text" name = "motDev" class = "inputPr">
                    <button value = "Buscar Proveedor" name = "operacion">
                    <img src="view/img/busqueda.png" class = "op" >
                    </button>
                    <div>
                        
                            <tr>
                                <td>CODIGO</td>
                                <td>NOMBRE DEL PROVEEDOR</td>
                                <td>EMPRESA</td>
                                <td>MOTIVO DE DEVOLUCION</td>
                            </tr>
                    </thead>
                    <tbody>
                    <tr class = "prov">
                                <td><?php echo $codProve?></td>
                                <td><?php echo $NombreProve?></td>
                                <td><?php echo $Empresa?></td>
                                <td><?php  echo $MotD = $_SESSION['MotD'] ?></td>
                            </tr>
                    </tbody>
                    </table>
            </div>
            <script>
    
            </script>
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
                    foreach($productosD as $a){
                    ?>
                    <tr>
                        <td><?php echo $a->COD_PRODUCTO;?></td>
                        <td><?php echo $a->NOMBRE;?></td>
                        <td><?php echo $a->cantidad;?></td>
                    </tr>
                </tbody>
            
      
                    <?php
                     $cantidadTotalD += ($a->cantidad);
                   }
                   $_SESSION['cantTD'] = $cantidadTotalD;
                    ?>
                    <tr><td>CANTIDAD TOTAL</td>
                    <td><?php echo $cantidadTotalD?></td>
                    </tr>
  </table>

        <input type="submit"  name = "operacion" value = "Guardar devolucion" class = "btns">
        <input type="submit" value = "Cancelar Detalle" name = "operacion" class = "btns">        
    </form>

    <?php
           if(isset($_POST['operacion'])){
            $operacion = $_REQUEST['operacion'];
            $objDaoDevolucion = new ModelDevolucionI();            
            switch ($operacion){//en caso de q operacion tenga el valor buscar cliente
                case 'Buscar Producto' : $objDaoDevolucion -> BuscarProductoD();//llame la funcion buscar cliente
                break;
                case 'Buscar Proveedor' : $objDaoDevolucion -> BuscarProveedor();//llame la funcion buscar cliente
                break;
                case 'Cancelar Detalle' : $objDaoDevolucion -> CancelarD();//llame la funcion buscar cliente
                break;
                case 'Guardar devolucion' : $objDaoDevolucion -> GuardarD();//llame la funcion buscar cliente
                break;
    
            } }

    ?>

       