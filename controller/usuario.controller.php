<?php
   
    class ControllerUsuario{
        public function InsertarUsuario( $Nombre, $Rol, $Contra, $Apellido, $Telefono, $Confirmacion, $Cedula, $Correo){
            
            try{
                $objDtoEmpleado = new RegistroEmp(null, $Nombre, $Rol, $Contra, $Apellido, $Telefono, $Confirmacion, $Cedula, $Correo);
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
            $objDaoEmpleado->mdlEliminarEmpleado();
            echo "<script>
                window.location = 'index.php?ruta=Conusuario'
            </script>";
           
            }
    
            public function ModificarUsuario(){
                $objDtoEmpleado = new RegistroEmp(
                $_POST["codEmpleado"],
                $_POST["Nombre"],
                $_POST["Apellido"],
                $_POST["Cedula"],
                $_POST["Telefono"],
                $_POST["Correo"],
                $_POST["contraseña"],
                $_POST["confirmar"],
                $_POST["Rol"]
                );
                var_dump($objDtoEmpleado);
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );
               
                if ($objDaoEmpleado -> mdlModificarUsuario() ) {
                    echo "funciono asi";
                    echo "<script>
                        Swal.fire(
                            'Producto',
                            'El usuario ha sido modificado',
                            'success'
                        );
                        </script>
                        
                    ";
                }
                else{
                    echo "ERROR";
                }
    }

    
}


 
 
?>



