<?php
    class ControllerProveedor{
        public function InsertarProveedor($Nombre, $NIT, $Telefono, $Empresa, $Direccion){
            try{
                $objDtoProveedor = new Proveedor(null,$Nombre, $NIT, $Telefono, $Empresa, $Direccion);
                $objDtoProveedor -> setNombre($Nombre);
                $objDtoProveedor -> setNIT($NIT);
                $objDtoProveedor -> setTelefono($Telefono);
                $objDtoProveedor -> setEmpresa($Empresa);
                $objDtoProveedor -> setDireccion($Direccion);

                $objDaoProveedor = new ModelProveedor($objDtoProveedor);
                
                if($objDaoProveedor -> mdlInsertarProveedor()){
                    echo "<script>alert('El proveedor ha sido registrado exitosamente')</script>";
                }
                else{
                    echo "<script>alert('Ha ocurrido un error en el registro')</script>";
                }
            }
            catch(Exception $e){
                echo "ERROR EN EL CONTROLADOR" . $e->getMessage();
            }
        }
        public function ConsultarProveedor(){
            $array = false;
            try{
                $objDtoProveedor = new Proveedor(null, null,null, null, null, null);
                $objDaoProveedor = new  ModelProveedor ( $objDtoProveedor );
                $array = $objDaoProveedor -> mdlConsultarProveedor() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $array;
            
        }   
        public function EliminarProveedor(){
            $objDtoProveedor = new Proveedor(
                $_GET['elimina'],
                null,
                null,
                null,
                null,
                null
            );
            $objDaoProveedor = new ModelProveedor($objDtoProveedor);

            $objDaoProveedor->mdlEliminarProveedor();
                echo "<script>
                window.location = 'index.php?ruta=Conproveedor'
                </script>";        
        }
       
        public function ModificarProovedor(){
       
            $objDtoProducto = new Proveedor(
                $_POST["codProveedor"],
                $_POST["Nombre"],
                $_POST["NIT"],
                $_POST["Empresa"],
                $_POST["Direccion"],
                $_POST["Telefono"]
                
            );
           
            $objDaoProducto = new ModelProveedor( $objDtoProducto );
            if ($objDaoProducto -> mdlModificarProveedor() ) {
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
       
    
    
    
    }



?>