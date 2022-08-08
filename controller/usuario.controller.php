<?php
   
    class ControllerUsuario{
        public function InsertarUsuario( $Nombre,  $Apellido, $Cedula, $Telefono,  $Correo, $Contra, $Rol){//Crea una funcion
            
            try{//si no hay error ejecute
                $objDtoEmpleado = new RegistroEmp(null, $Nombre,  $Apellido, $Cedula, $Telefono,  $Correo, $Contra, $Rol);//llama la clase empleado por medio del objeto
                $objDtoEmpleado -> setNombre($Nombre);//por medio del objeto llame la funcion y asignele la variable
                $objDtoEmpleado -> setApellido($Apellido);
                $objDtoEmpleado -> setCedula($Cedula);
                $objDtoEmpleado -> setTelefono($Telefono);
                $objDtoEmpleado -> setCorreo($Correo);
                $objDtoEmpleado -> setContra($Contra);
                $objDtoEmpleado -> setRol($Rol);
                
                
                
                
                
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );//crea un objeto que llama la clase 
                $objDaoEmpleado ->  mdlInsertEmpleado();//el dao llama la funcion
                if ( $this->Estado = True ){//si estado es verdadero ejecute la alerta de exito
                    
                    echo "<script>alert('El registro ha sido guardado')</script>";
                    
                }//Si no ejecute la alerte de error
                else{
                   echo "<script>alert('ERROR EN EL REGISTRO')</script>";
                }
           }
           catch(Exception $e){//En caso de error ejecute 
                echo "<script>alert('Error en el registro')</script)";
           }
         }
 
     
            public function ConsultarUsuario(){//Creamos la funcion
            $array = false;
            try{
                $objDtoEmpleado = new RegistroEmp(null, null, null, null, null, null, null, null, null);//llamamos el dto y le asignamos nulo porque no necesitamos enviar datos
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );//llamamos la clase por medio del objeto
                $array = $objDaoEmpleado -> mdlConsultarEmpleado() -> fetchAll();//la cllase dao llama la consulta
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $array;
            
        }

        public function EliminarUsuario(){//Creamos la funcion
            $objDtoEmpleado = new RegistroEmp(//Llamamos el dto por medio de un objeto
            $_GET['elimina'],//asignamos lo que tiene get elimina
            NULL,//campos nulos porque no necesitamos enviar valores
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
            );
           
            $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );//llamamos la clase por medio del objeto
            $objDaoEmpleado->mdlEliminarEmpleado();//el objeto llama la funcion y recarga la pagina
            echo "<script>
                window.location = 'index.php?ruta=Conusuario'
            </script>";
           
            }
    
            public function ModificarUsuario(){//crea la funcion
                $objDtoEmpleado = new RegistroEmp(//por medio del objeto llamamos el dto
                $_POST["codEmpleado"],//enviamos lo que tiene post en el campo de codEmpleado
                $_POST["Nombre"],
                $_POST["Apellido"],
                $_POST["Cedula"],
                $_POST["Telefono"],
                $_POST["Correo"],
                null,
                $_POST["Rol"]
                );
                $objDaoEmpleado = new  ModelRegistroEmp ( $objDtoEmpleado );//por medio del objeto llamamos la clase
               
                if ($objDaoEmpleado -> mdlModificarUsuario() ) {//si el objeto ejecuta la funcion recargue la pagina
                    echo "<script>
                    window.location = 'index.php?ruta=Conusuario'
                    </script>";
                    echo "<script>
                        Swal.fire(
                            'Producto',
                            'El usuario ha sido modificado',
                            'success'
                        );
                        </script>
                        
                    ";
                }
                else{//de otra manera mande un error
                    echo "ERROR";
                }
    }

    
}


 
 
?>



