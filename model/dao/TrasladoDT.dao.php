<?php

    class ModelTraslado{
        function BuscarBodega(){
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $codBD = $_REQUEST['codBodega'];//le asignamos a la variable doccumento el valor recibido de documento
            $bodega = $bd->query("SELECT * FROM bodega WHERE COD_BODEGA = $codBD")->fetch(PDO::FETCH_OBJ);
            $_SESSION['bodega'] = $bodega; 
            $_SESSION['codBod'] = $codBD;   
            //print_r($_SESSION['proveedor']['COD_PROVEEDOR']);
        }        
        
    

    function BuscarProductoT(){
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        $cantidadPT = $_REQUEST['cantidad'];
        $codigoPT = $_REQUEST['codProducto'];
        $productosT = $bd->query("SELECT * FROM PRODUCTO WHERE COD_PRODUCTO = $codigoPT")->fetch(PDO::FETCH_OBJ);
        $productosT->cantidad = $cantidadPT;
        $_SESSION['productosT'][] = $productosT;
    }

    public function CancelarTraslado(){
        unset($_SESSION['productosT']); //Destruimos la session de productos
        unset($_SESSION['bodega']);
    }

    public function GuardarTraslado(){
        $Estado = false;
        $codU = $_SESSION['datos']['COD_EMPLEADO'];//llamamos la session donde tenemos el codigo del empleado
        $cantidadPT = $_REQUEST['cantidad'];
        $cantidadTotal = $_SESSION['cantT'];
        //($cantidadTotal);
        $codBD = $_SESSION['codBod'];
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        if($cantidadTotal <= 0){//Si la cantidad es menor o igual a 0 que mande una alerta
            echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
        }
        else{//Si la cantidad es superior a 0 que me realiza lo siguiente
           
            $stmt = $bd->prepare("INSERT INTO TRASLADO (COD_EMPLEADO, COD_BODEGA) VALUES('$codU', '$codBD')");//Insertamos la entrada y le enviamos el codigo del empleado
            $stmt -> execute();
            $Estado = true;
            $id = $bd->lastInsertId();//recuperamos el ultimo id insertado
            if($Estado = true){
                echo '<script language="javascript">alert("Traslado registrada exitosamente");</script>';
            }
            $productosT = $_SESSION['productosT'];
            foreach($productosT as $a){ //Creamos un foreach para una insercion multiple
            $bd->query("INSERT INTO detalle_traslado(CANTIDAD_UNIDAD, COD_PRODUCTO, COD_TRASLADO) VALUES('$a->cantidad', '$a->COD_PRODUCTO', $id)");
            }
            $cantidadTotal = $_SESSION['cantT'];
            $stmt = $bd->prepare("UPDATE `TRASLADO` SET `CANTIDAD_TOTAL`= $cantidadTotal WHERE COD_TRASLADO = $id");//Modificamos la cantidad de la salida
            $stmt -> execute();
            unset($_SESSION['cantT']);//destruimos la session que almacena cantidad
    }

}}


?>