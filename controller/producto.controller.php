<?php
class ControllerProducto{

    public function InsertarProducto($Nombre, $Referencia, $Cantidad, $Disponibilidad){
        try{
            $objDtoProducto = new Producto(null, $Nombre, $Referencia, $Cantidad, $Disponibilidad);
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


    public function ModificarProducto(){
       
        $objDtoProducto = new Producto(
            $_POST["codProducto"],
            $_POST["NombreP"],
            $_POST["ReferenciaP"],
            $_POST["CantidadP"],
            $_POST["DisponibilidadP"]
            
        );
       
        $objDaoProducto = new ModelProducto( $objDtoProducto );
        if ($objDaoProducto -> mdlModificarProducto() ) {
            echo "<script>
            window.location = 'index.php?ruta=Conproducto'
            </script>";
            echo "<script>
                Swal.fire(
                    'Producto',
                    'El producto ha sido modificado',
                    'success'
                );
                </script>
            ";
        }else{
            echo "<script>
                Swal.fire(
                    'Producto',
                    'No se pudo modificar',
                    'danger'
                );
                </script>
            ";
        }
       
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
        $objDaoProducto -> mdlEliminarProducto();
        echo "<script>
            window.location = 'index.php?ruta=Conproducto'
        </script>";
    

 
}


    public function BuscarProducto(){
        $array = false;
        try{
            $objDtoProducto = new Producto(null, null,null, null, null);
            $objDaoProducto = new  ModelProducto ( $objDtoProducto );
            $array = $objDaoProducto -> mdlBuscarProducto() -> fetchAll();
        }
        catch(Exception $e){
            echo "ERROR";
        }
        return $array;
        
    }   
}


?>