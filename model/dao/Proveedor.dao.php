<?php


    class ModelProveedor{
        private $codProveedor;//Creamos las variables
        private $Nombre;
        private $NIT;
        private $Telefono;
        private $Empresa;
        private $Direccion;
        private $Estado;
    
        public function __construct($objDtoProveedor){//llamamos el metodo de arranque
            $this->codProveedor = $objDtoProveedor -> getCodProov();
            $this->Nombre = $objDtoProveedor -> getNombre();
            $this->NIT = $objDtoProveedor -> getNIT();
            $this->Empresa = $objDtoProveedor -> getEmpresa();
            $this->Direccion = $objDtoProveedor -> getDireccion();
            $this->Telefono = $objDtoProveedor -> getTelefono(); 
        }
    
        public function mdlInsertarProveedor(){//Crear funcion de insertar proveedor
                $sql = "CALL splInsertarProveedor( ?, ?, ?, ?, ? );";//Llama el procedimiento almacenado
                $this -> Estado = false;//Se le asigna a estado el valor de false
                try {
                    $con = new Conexion();//Llamamos la conexion
                    $stmt = $con -> conexion() -> prepare($sql);//Preparamos sql
                    $stmt -> bindParam ( 1, $this->Nombre, PDO::PARAM_STR);//Envia los parametros insertados
                    $stmt -> bindParam ( 2, $this->NIT, PDO::PARAM_INT);
                    $stmt -> bindParam ( 3, $this->Empresa,  PDO::PARAM_STR);
                    $stmt -> bindParam ( 4, $this->Direccion, PDO::PARAM_STR );
                    $stmt -> bindParam ( 5, $this->Telefono,  PDO::PARAM_INT);
                    $stmt -> execute();//Ejecute la insercion
                    $this -> Estado = true;//Si llego hasta aca asignele a estado valor de true
                } catch (PDOException $ex) {//Si hay un error envie un mensaje con el error
                    echo "Hay un error en el dao de producto " . $ex -> getMessage();
                }
                return $this -> Estado;
            
        }

        public function mdlConsultarProveedor(){//Crear funcion para consultar
            $sql = "CALL splConsultarProveedor()";//Llama el procedimiento almacenado
            $resultset = false;
            try{
                $con = new Conexion();//Llama la conexion
                $stmt = $con -> conexion() -> prepare($sql);//prepara sql
                $stmt -> execute();//Ejecuta la consulta
                $resultset = $stmt;
                
            }
            catch(Exception $e){//Si hay un error envie un mensaje con el error
                echo "Error al listar proveedores";
            }
            return $resultset;
        }

        public function mdlEliminarProveedor(){//Creamos la funcion para eliminar
            $sql = "CALL splEliminarProveedor(?)";//Llamamos el procedimiento almacenado
            $this -> Estado = False;
            try{
                $con = new Conexion();//Llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos la sql
                $stmt -> bindParam(1, $this->codProveedor, PDO::PARAM_INT);//Enviamos el codigo del proveedor
                $stmt -> execute();//Ejecuta la insercion
                $this->Estado = true;
            }
            catch(Exception $e){
                echo "ERROR AL ELIMINAR PROVEEDOR" . $e->getMessage();
    
    
            }
        }    

        public function mdlModificarProveedor(){//Creamos la funcion
            $sql = "CALL splModificarProveedor(?,?,?,?,?,?)";//llamamos el procedimiento almacenado
            $this -> Estado = false;
            try {
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos sql
                $stmt -> bindParam ( 1, $this->codProveedor, PDO::PARAM_INT);//Enviamos los parametros
                $stmt -> bindParam ( 2, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam ( 3, $this->NIT, PDO::PARAM_INT);
                $stmt -> bindParam ( 4, $this->Empresa,  PDO::PARAM_STR);
                $stmt -> bindParam ( 5, $this->Direccion, PDO::PARAM_STR );
                $stmt -> bindParam ( 6, $this->Telefono,  PDO::PARAM_INT);
                $stmt -> execute();//ejecuta la modificacion
                $this -> Estado = true;
            } catch (PDOException $ex) {//Si hay un error envie un mensaje
                echo "Hay un error en el dao de producto " . $ex -> getMessage();
            }
            return $this -> Estado;
        }//FIN DE MODIFICAR PRODUCTO
    
    

   
    }  
?>