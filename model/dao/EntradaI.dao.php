<?php

    class ModelEntradaI{

        function BuscarProductoE(){
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $cantidadPE = $_REQUEST['cantidad'];
            $codigoPE = $_REQUEST['codProducto'];
            $precioPE = $_REQUEST['precio'];
            
            $productosE = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPE")->fetch(PDO::FETCH_OBJ);
            $productosE->cantidad = $cantidadPE;
            $productosE->precio = $precioPE;
            $_SESSION['productosE'][] = $productosE;

            
        }

        public function GuardarE(){
            $codU = $_SESSION['datos']['COD_EMPLEADO'];
            $cantidadPE = $_REQUEST['cantidad'];
            $codigoPE = $_REQUEST['codProducto'];
            $precioPE = $_REQUEST['precio'];
            $cantidadTotalE = $_SESSION['cantTE'];
            $precioTotalE = $_SESSION["precioTE"];
            
            if($cantidadTotalE <= 0){
                echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
            }
            else{
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("INSERT INTO ENTRADA (COD_EMPLEADO) VALUES('$codU')");
                $stmt -> execute();
                $id = $bd->lastInsertId();    
            //print_r($cantidad);
            
          
                $productosE = $_SESSION['productosE'];
                foreach($productosE as $a){ 
                $bd->query("INSERT INTO detalle_entrada(CANTIDAD, COD_PRODUCTO, COD_ENTRADA, PRECIO_UNIDAD, SUBTOTAL) VALUES($a->cantidad, $a->COD_PRODUCTO, $id, $a->precio, $a->precio * $a->cantidad)");
            }
            $cantidadTotalE = $_SESSION['cantTE'];
            $precioTotalE = $_SESSION["precioTE"];
            $stmt = $bd->prepare("UPDATE `entrada` SET `CANTIDAD_TOTAL`= $cantidadTotalE, `PRECIO_TOTAL` =  $precioTotalE   WHERE COD_ENTRADA = $id");//Modificamos la cantidad de la salida
            $stmt -> execute();
            unset($_SESSION['cantTE']);//destruimos la session que almacena cantidad
            unset($_SESSION['precioTE']);
            }
               
        }

        public function CancelarE(){
            unset($_SESSION['productosE']); 
        }
    }

?>