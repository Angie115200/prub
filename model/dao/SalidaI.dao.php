<?php

    class ModelSalidaI{
        
        public function BuscarProducto(){
            $codigo = $_REQUEST['codProducto'];
            $cantidad = $_REQUEST['cantidad'];
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $productos = $bd->query("SELECT * FROM producto WHERE COD_PRODUCTO = $codigo")->fetch(PDO::FETCH_OBJ);
            $productos -> cantidad = $cantidad;
            $_SESSION['productos'][] = $productos;
        }
        public function Cancelar(){
            unset($_SESSION['productos']); 
        }
        public function GuardarS(){
            $codU = $_SESSION['datos']['COD_EMPLEADO'];
            $cantidad = $_REQUEST['cantidad'];
            $cantidadTotal = $_REQUEST[$cantidadTotal];
            print_r($cantidadTotal);
            $productos ->cantidad = $cantidad;
            
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("INSERT INTO SALIDA (COD_EMPLEADO) VALUES('$codU')");
                $stmt -> execute();
                $id = $bd->lastInsertId();    
            //print_r($cantidad);
            
            
            $productos = $_SESSION['productos'];
            foreach($productos as $a){ 
                $bd->query("INSERT INTO detalle_salida(CANTIDAD, COD_PRODUCTO, COD_SALIDA) VALUES($a->cantidad, $a->COD_PRODUCTO, $id)");
            }
            
        }
      
    }


?>