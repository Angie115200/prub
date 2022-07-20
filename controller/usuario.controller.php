<?php
   
    class ControllerUsuario{
        public function InsertarUsuario( $Nombre, $Rol, $Contra, $Apellido, $Telefono, $Confirmacion, $Cedula, $Correo){
            
            try{
                $objDtoEmpleado = new RegistroEmp();
                $objDtoEmpleado -> setNombre($Nombre);
                $objDtoEmpleado -> setRol($Rol);
                $objDtoEmpleado -> setContra($Contra);
                $objDtoEmpleado -> setConfirmacion($Confirmacion);
                $objDtoEmpleado -> setApellido($Apellido);
                $objDtoEmpleado -> setTelefono($Telefono);
                $objDtoEmpleado -> setCedula($Cedula);
                $objDtoEmpleado -> setCorreo($Correo);

                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );
                $objDaoEmpleado ->  mdlInsertEmpleado();
                if ( $this->Estado = True ){
                    
                    echo "<script>alert('El registro ha sido guardado')</script>";
                }
                else{
                   echo "<script>alert('ERROR EN EL REGISTRO')</script>";
                }
           }
           catch(Exception $e){
                echo "<script>alert('Error en el registro')</script)";
           }
         }
 
     
            public function ConsultarUsuario(){
            $array = false;
            try{
                $objDtoEmpleado = new RegistroEmp(null, null, null, null, null, null, null, null, null);
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );
                $array = $objDaoEmpleado -> mdlConsultarEmpleado() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $array;
            
        }

        public function EliminarUsuario(){
            $objDtoEmpleado = new RegistroEmp(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
            );
           
            $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );
            
            if( $objDaoEmpleado->mdlEliminarEmpleado()){
                echo "<script>
                window.location = 'index4.php?ruta=usuario'
                </script>";
            }
           
            }
    
            public function ModificarUsuario(){
                $objDtoEmpleado = new RegistroEmp(
                $_POST["Nombre"],
                $_POST["Rol"],
                $_POST["Contra"],
                $_POST["Apellido"],
                $_POST["Telefono"],
                $_POST["Confirmacion"],
                $_POST["Cedula"],
                $_POST["Correo"]
                );
            
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );
                if ($objDaoEmpleado -> mdlModificarEmpleado() ) {
                    echo "<script>
                        Swal.fire(
                            'Producto',
                            'El producto ha sido modificado',
                            'success'
                        );
                        </script>
                    ";}
    }
}
?>