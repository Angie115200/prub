<?php
class ControllerProducto{
    public function InsertarProducto($Nombre, $Referencia, $Cantidad, $Disponibilidad){
        try{
            $objDtoProducto = new Producto();
            $objDtoProducto -> setNombre($Nombre);
            $objDtoProducto -> setReferencia($Referencia);
            $objDtoProducto -> setCantidad($Cantidad);
            $objDtoProducto -> setDisponibilidad($Disponibilidad);

            $objDaoProducto = new ModelProducto($objDtoProducto);
            
            if($objDaoProducto -> mdlInsertarProducto()){
                echo "<script>alert('El producto ha sido registrado exitosamente')</script>";
            }
            else{
                echo "<script>alert('Ha ocurrido un error en el registro')</script>";
            }
        }
        catch(Exception $e){
            echo "ERROR";
        }
    }
        
    public function ConsultarProducto(){
        $array = false;
        try{
            $objDtoProducto = new Producto(null, null,null, null, null);
            $objDaoProducto = new  ModelProducto ( $objDtoProducto );
            $array = $objDaoProducto -> mdlConsultarProducto() -> fetchAll();
        }
        catch(Exception $e){
            echo "ERROR";
        }
        return $array;
        
    }   

    public function EliminarProducto(){
        $objDtoProducto = new Producto(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,
            NULL,
        );
       
        $objDaoProducto = new ModelProducto($objDtoProducto);
        if($objDaoProducto -> mdlEliminarProducto()){
            echo "<script>
            window.location = 'index3.php?ruta=producto'
            </script>";
        }

 
}}


?>