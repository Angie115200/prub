<?php

    class ModelDevolucionI{

        
    function BuscarProveedor(){
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        $codProve = $_REQUEST['codProveedor'];//le asignamos a la variable doccumento el valor recibido de documento
        $proveedor = $bd->query("SELECT * FROM proveedor WHERE COD_PROVEEDOR = $codProve")->fetch(PDO::FETCH_OBJ);
        $MotD = $_REQUEST['motDev'];
        $_SESSION['MotD'] = $MotD;
        $_SESSION['proveedor'] = $proveedor;
        $_SESSION['codPro'] = $codProve;    
        //print_r($_SESSION['proveedor']['COD_PROVEEDOR']);
       
    }
     

        function BuscarProductoD(){
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $cantidadPD = $_REQUEST['cantidad'];
            $codigoPD = $_REQUEST['codProducto'];
            $codProve = $_REQUEST['codProveedor'];
            $productosD = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPD")->fetch(PDO::FETCH_OBJ);
            $productosD->cantidad = $cantidadPD;
            $_SESSION['productosD'][] = $productosD;
           
        }

        public function GuardarD(){
            $codU = $_SESSION['datos']['COD_EMPLEADO'];
            $MotD = $_SESSION['MotD'];
            $codProveedor = $_SESSION['codPro'];
            $codigoPD = $_REQUEST['codProducto'];
            $cantidadTotalD = $_SESSION['cantTD'];
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            if($cantidadTotalD <= 0){
                echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
            }
            else{
                $Estado = false;
                $stmt = $bd->prepare("INSERT INTO `devolucion`(`CANTIDAD_TOTAL`, `COD_EMPLEADO`, `COD_PROVEEDOR`,`MOTIVO_DEVOLUCION`) VALUES ('$cantidadTotalD','$codU','$codProveedor', '$MotD')");
                $stmt -> execute();
                $id = $bd->lastInsertId();//llame la funcion buscar cliente;//llame la funcion buscar cliente
                $Estado = true;
                if($Estado = true){
                    echo '<script language="javascript">alert("Devolucion registrada exitosamente");</script>';
                }
                
               
            //print_r($cantidad);
                $productosD = $_SESSION['productosD'];
                foreach($productosD as $a){ 
                $bd->query("INSERT INTO detalle_devolucion(CANTIDAD_UNIDAD, COD_PRODUCTO, COD_DEVOLUCION) VALUES('$a->cantidad', '$a->COD_PRODUCTO', $id)");
               
                }
               
        }
    }

    public function CancelarD(){
        unset($_SESSION['productosD']); 
        unset($_SESSION['proveedor']); 
        unset($_SESSION['MotD']);
        unset($_SESSION['codPro']);
    }
    }

?>