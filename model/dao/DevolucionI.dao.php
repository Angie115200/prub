<?php

    class ModelDevolucionI{

        function BuscarProductoD(){
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $cantidadPD = $_REQUEST['cantidad'];
            $codigoPD = $_REQUEST['codProducto'];
            $precioPD = $_REQUEST['precio'];
            $codigoPRO = $_REQUEST['codProveedor'];
            
            $productosE = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPE")->fetch(PDO::FETCH_OBJ);
            $productosE->cantidad = $cantidadPE;
            $productosE->precio = $precioPE;
            $_SESSION['productosE'][] = $productosE;

            $proveedor = $bd->query("SELECT * FROM PROVEEDOR WHERE COD_PROVEEDOR = $codigoPRO")->fetch(PDO::FETCH_OBJ);
                        
        }

    }


?>