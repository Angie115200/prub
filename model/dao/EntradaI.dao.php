<?php

    class ModelEntradaI{

        function BuscarProductoE(){//Creamos una funcion
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');//llamamos la base de datos
            $cantidadPE = $_REQUEST['cantidad'];//le asignamos a la variable lo que recepcione de cantidad
            $codigoPE = $_REQUEST['codProducto'];
            $precioPE = $_REQUEST['precio'];
            
            $productosE = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPE")->fetch(PDO::FETCH_OBJ);//Ejecutamos la consulta
            $productosE->cantidad = $cantidadPE;
            $productosE->precio = $precioPE;
            $_SESSION['productosE'][] = $productosE;//Asignamos la variable a lo que tiene la session

            
        }

        public function GuardarE(){//creamos la funcion para guardar
            $codU = $_SESSION['datos']['COD_EMPLEADO'];//Guardamos el codigo del usuario para saber quien hizo el movimiento
            $cantidadPE = $_REQUEST['cantidad'];//Almacenamos en la variable lo que tiene request cantidad
            $codigoPE = $_REQUEST['codProducto'];
            $precioPE = $_REQUEST['precio'];
            $cantidadTotalE = $_SESSION['cantTE'];
            $precioTotalE = $_SESSION["precioTE"];
            
            if($cantidadTotalE <= 0){//Si la cantidad es inferior o igual a cero envie una alerta de aviso
                echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
            }
            else{//De otra manera ejecute lo siguiente
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("INSERT INTO ENTRADA (COD_EMPLEADO) VALUES('$codU')");//Inserte la entrada
                $stmt -> execute();
                $id = $bd->lastInsertId();    
                $Estado = true;
                if($Estado = true){
                    echo '<script language="javascript">alert("Entrada registrada exitosamente");</script>';
                }
            //print_r($cantidad);
            
          
                $productosE = $_SESSION['productosE'];
                foreach($productosE as $a){ //Usamos un foreach para realizar una insercion multiple
                $bd->query("INSERT INTO detalle_entrada(CANTIDAD, COD_PRODUCTO, COD_ENTRADA, PRECIO_UNIDAD, SUBTOTAL) VALUES($a->cantidad, $a->COD_PRODUCTO, $id, $a->precio, $a->precio * $a->cantidad)");
            }
            $cantidadTotalE = $_SESSION['cantTE'];
            $precioTotalE = $_SESSION["precioTE"];
            $stmt = $bd->prepare("UPDATE `entrada` SET `CANTIDAD_TOTAL`= $cantidadTotalE, `PRECIO_TOTAL` =  $precioTotalE   WHERE COD_ENTRADA = $id");//Modificamos la cantidad de la salida
            $stmt -> execute();
            unset($_SESSION['cantTE']);//destruimos la session que almacena cantidad
            unset($_SESSION['precioTE']);
            unset($_SESSION['productosE']); 
            }
               
        }

        public function CancelarE(){
            unset($_SESSION['productosE']); 
        }
    }

?>