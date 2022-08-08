<?php

    class ModelDevolucionI{

        
    function BuscarProveedor(){//Creamos la funcion que buscara el proveedor
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');//llamamos la base de datos
        $codProve = $_REQUEST['codProveedor'];//le asignamos a la variable doccumento el valor recibido de documento
        $proveedor = $bd->query("SELECT * FROM proveedor WHERE COD_PROVEEDOR = $codProve")->fetch(PDO::FETCH_OBJ);
        $MotD = $_REQUEST['motDev'];
        $_SESSION['MotD'] = $MotD;//Le asigansmos a session MotD lo que tiene la variable MotD
        $_SESSION['proveedor'] = $proveedor;//Guardamos los datos del array en una variable
        $_SESSION['codPro'] = $codProve;    
       
    }
     

        function BuscarProductoD(){//creamos la funcion que buscara el producto
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $cantidadPD = $_REQUEST['cantidad'];
            $codigoPD = $_REQUEST['codProducto'];
            $codProve = $_REQUEST['codProveedor'];
            $productosD = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPD")->fetch(PDO::FETCH_OBJ);
            $productosD->cantidad = $cantidadPD;
            $_SESSION['productosD'][] = $productosD;
           
        }

        public function GuardarD(){//Creamos la funcion que guardara las devoluciones
            $codU = $_SESSION['datos']['COD_EMPLEADO'];//almacenamos en la variable codU la session del logeo para obtener quien hizo el movimiento
            $MotD = $_SESSION['MotD'];
            $codProveedor = $_SESSION['codPro'];
            $codigoPD = $_REQUEST['codProducto'];
            $cantidadTotalD = $_SESSION['cantTD'];
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            if($cantidadTotalD <= 0){//Fijamos que si la cantidad total es menor a 0 entonces envie una alerta
                echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
            }
            else{//de lo contrario que ejecute la insercion
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
                foreach($productosD as $a){ //Creamos un for each para realizar insercion de un array
                $bd->query("INSERT INTO detalle_devolucion(CANTIDAD_UNIDAD, COD_PRODUCTO, COD_DEVOLUCION) VALUES('$a->cantidad', '$a->COD_PRODUCTO', $id)");
               
                }
                $cantidadTotalD = $_SESSION['cantTD'];
                $stmt = $bd->prepare("UPDATE `devolucion` SET `CANTIDAD_TOTAL`= $cantidadTotalD WHERE COD_ENTRADA = $id");//Modificamos la cantidad de la salida
                $stmt -> execute();
                unset($_SESSION['cantTD']);//destruimos la session que almacena cantidad

               
        }
    }

    public function CancelarD(){
        unset($_SESSION['productosD']); //destruya las sessiones
        unset($_SESSION['proveedor']); 
        unset($_SESSION['MotD']);
        unset($_SESSION['codPro']);
    }
    }

?>