<?php
    class ControllerProveedor{
        public function InsertarProveedor($Nombre, $NIT, $Telefono, $Empresa, $Direccion){//Se crea la funcion que recepcionara los datos
            try{//Si no hay errores ejecuta lo siguiente
                $objDtoProveedor = new Proveedor(null,$Nombre, $NIT, $Telefono, $Empresa, $Direccion);//Llamamos el dto por medio del objeto
                $objDtoProveedor -> setNombre($Nombre);//Por medio del objeto dto capturamos los datos enviados en la variable
                $objDtoProveedor -> setNIT($NIT);
                $objDtoProveedor -> setTelefono($Telefono);
                $objDtoProveedor -> setEmpresa($Empresa);
                $objDtoProveedor -> setDireccion($Direccion);

                $objDaoProveedor = new ModelProveedor($objDtoProveedor);//Llamamos la clase dao por medio de un objeto
                
                if($objDaoProveedor -> mdlInsertarProveedor()){//Si el dao llama el mdlInsertar envie una alerta de exito
                    echo "<script>alert('El proveedor ha sido registrado exitosamente')</script>";
                }
                else{//Si no que envie una alerta de error
                    echo "<script>alert('Ha ocurrido un error en el registro')</script>";
                }
            }
            catch(Exception $e){//Si hay un error en el try catch envie un mensaje
                echo "ERROR EN EL CONTROLADOR" . $e->getMessage();
            }
        }
        public function ConsultarProveedor(){//Crear funcion  de consulta
            $array = false;
            try{
                $objDtoProveedor = new Proveedor(null, null,null, null, null, null);//Por medio del objeto llamamos la clase proveedor y le enviamos valores nulos porque no necesitamos ingresar ningun dato
                $objDaoProveedor = new  ModelProveedor ( $objDtoProveedor );//Llamamos el dao por medio del objeto
                $array = $objDaoProveedor -> mdlConsultarProveedor() -> fetchAll();//Al array se le asigna el objeto dao y el ejecuta la consulta
            }
            catch(Exception $e){//Si hay un error muestre un mensaje
                echo "ERROR";
            }
            return $array;
            
        }   
        public function EliminarProveedor(){//Creamos la funcion que va a ecargarse de recepcionar los datos para eliminar
            $objDtoProveedor = new Proveedor(//llamamos el dto y le asignamos los valores
                $_GET['elimina'],//El primero valor es $_GET para recepcionar el codigo
                null,//Los demas valores son nulos porque no necesitamos enviar ningun dato
                null,
                null,
                null,
                null
            );
            $objDaoProveedor = new ModelProveedor($objDtoProveedor);//Llamamos el dao 

            $objDaoProveedor->mdlEliminarProveedor();//Ejecute la funcion de eliminar y envie una alerta de exito
                echo "<script>
                window.location = 'index.php?ruta=Conproveedor'
                </script>";        
        }
       
        public function ModificarProovedor(){//Creamos la funcion que va a modificar los datos
       
            $objDtoProducto = new Proveedor(//le asignamos al objeto dto la clase
                $_POST["codProveedor"],//Recepcionamos los datos
                $_POST["Nombre"],
                $_POST["NIT"],
                $_POST["Empresa"],
                $_POST["Direccion"],
                $_POST["Telefono"]
                
            );
           
            $objDaoProducto = new ModelProveedor( $objDtoProducto );//Llamamos el dao por medio de un objeto
            if ($objDaoProducto -> mdlModificarProveedor() ) {//Si ejecuta la modificacion envia una alerta
                echo "<script>
                window.location = 'index.php?ruta=Conproveedor'
                </script>";
                echo "<script>
                    Swal.fire(
                        'Producto',
                        'El producto ha sido modificado',
                        'success'
                    );
                    </script>
                ";
            }else{//Si no se ejecuta envia alerta de error
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
       
    
    
    
    }



?>