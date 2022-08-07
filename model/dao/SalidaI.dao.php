<?php

    class ModelSalidaI{//Creamos una clase
        
        public function BuscarProducto(){//Creamos una funcion
            $codigo = $_REQUEST['codProducto'];//Recepcionamos el dato ingresado en el formulario 
            $cantidad = $_REQUEST['cantidad'];
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');//Creamos la conexion
                $productos = $bd->query("SELECT * FROM producto WHERE COD_PRODUCTO = $codigo")->fetch(PDO::FETCH_OBJ);//Ejecutamos una consulta
                $productos -> cantidad = $cantidad;//Le asignamos al array una variable llamada cantidad
                $_SESSION['productos'][] = $productos;//Llamamos el array almacenado en session usando []
           
        }
        public function Cancelar(){
            unset($_SESSION['productos']); //Destruimos la session de productos
        }
        public function GuardarS(){
            $codU = $_SESSION['datos']['COD_EMPLEADO'];//llamamos la session donde tenemos el codigo del empleado
            $cantidad = $_REQUEST['cantidad'];
            $cantidadTotal = $_REQUEST[$cantidadTotal];
            $productos ->cantidad = $cantidad;
            $cantidadTotal = $_SESSION['cantT'];//Le asignamos a la variable la session que almacena la cantidad
            if($cantidadTotal <= 0){//Si la cantidad es menor o igual a 0 que mande una alerta
                echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
            }
            else{//Si la cantidad es superior a 0 que me realiza lo siguiente
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("INSERT INTO SALIDA (COD_EMPLEADO) VALUES('$codU')");//Insertamos la entrada y le enviamos el codigo del empleado
                $stmt -> execute();
                $id = $bd->lastInsertId();//recuperamos el ultimo id insertado
            //print_r($cantidad);
            
            
            $productos = $_SESSION['productos'];
            foreach($productos as $a){ //Hacemos una insercion multiple y le ingresamos el ultimo id
                $bd->query("INSERT INTO detalle_salida(CANTIDAD, COD_PRODUCTO, COD_SALIDA) VALUES($a->cantidad, $a->COD_PRODUCTO, $id)");
            }
            $cantidadTotal = $_SESSION['cantT'];
            $stmt = $bd->prepare("UPDATE `salida` SET `CANTIDAD_TOTAL`= $cantidadTotal WHERE COD_SALIDA = $id");//Modificamos la cantidad de la salida
            $stmt -> execute();
            unset($_SESSION['cantT']);//destruimos la session que almacena cantidad

            
        }
            }
          
      
    }


?>