<form action="" method = "POST">
    <input type="submit" name = "guarda">
</form>

<?php
//session_start();
//include_once "conexion.php";
    /*$sql = "INSERT INTO PRUEBA (NOMBRE, TELEFONO) VALUES('XD', '1212')";
    try{
        $con = new Conexion();
        $stmt = $con -> conexion() -> prepare($sql);
        $stmt -> execute();
        return $this->id = $con ->lastInsertId();
        echo $id;
    }
    catch(Exception $e){
        echo "ERROR";
    }*/
   
    if(isset($_POST['guarda'])){
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        $stmt = $bd->prepare("INSERT INTO SALIDA (COD_EMPLEADO) VALUES('3')");
        $stmt -> execute();
    }
       

   
   
    //$id = $bd->lastInsertId();
    //echo $id;

    ?>