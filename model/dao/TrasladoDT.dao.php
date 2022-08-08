<?php

    class ModelTraslado{
        function BuscarBodega(){
            $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
            $codBD = $_REQUEST['codBodega'];//le asignamos a la variable doccumento el valor recibido de documento
            $bodega = $bd->query("SELECT * FROM bodega WHERE COD_BODEGA = $codBD")->fetch(PDO::FETCH_OBJ);
            $_SESSION['bodega'] = $bodega;    
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
        $codU = $_SESSION['datos']['COD_EMPLEADO'];//llamamos la session donde tenemos el codigo del empleado
        $cantidadPT = $_REQUEST['cantidad'];
        $cantidadTotal = $_SESSION['cantT'];
        $codBD = $_SESSION['bodega'];
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        if($cantidadTotal <= 0){//Si la cantidad es menor o igual a 0 que mande una alerta
            echo '<script language="javascript">alert("Porfavor ingrese minimo un producto para realizar el movimiento");</script>';
        }
        else{//Si la cantidad es superior a 0 que me realiza lo siguiente
            $stmt = $bd->prepare("INSERT INTO TRASLADO (COD_EMPLEADO, COD_BODEGA) VALUES('$codU', '$codBD')");//Insertamos la entrada y le enviamos el codigo del empleado
            $stmt -> execute();
            $id = $bd->lastInsertId();//recuperamos el ultimo id insertado
        //print_r($cantidad);
        
    }

}}


?>