<?php

   

    class ModelProveedor{
        private $codProveedor;
        private $Nombre;
        private $NIT;
        private $Telefono;
        private $Empresa;
        private $Direccion;
        private $Estado;
    
        public function __construct($objDtoProveedor){
            $this->codProveedor = $objDtoProveedor -> getCodProov();
            $this->Nombre = $objDtoProveedor -> getNombre();
            $this->NIT = $objDtoProveedor -> getNIT();
            $this->Empresa = $objDtoProveedor -> getEmpresa();
            $this->Direccion = $objDtoProveedor -> getDireccion();
            $this->Telefono = $objDtoProveedor -> getTelefono(); 
        }
    
        public function mdlInsertarProveedor(){
                $sql = "CALL splInsertarProveedor( ?, ?, ?, ?, ? );";
                $this -> Estado = false;
                try {
                    $con = new Conexion();
                    $stmt = $con -> conexion() -> prepare($sql);
                    $stmt -> bindParam ( 1, $this->Nombre, PDO::PARAM_STR);
                    $stmt -> bindParam ( 2, $this->NIT, PDO::PARAM_INT);
                    $stmt -> bindParam ( 3, $this->Empresa,  PDO::PARAM_STR);
                    $stmt -> bindParam ( 4, $this->Direccion, PDO::PARAM_STR );
                    $stmt -> bindParam ( 5, $this->Telefono,  PDO::PARAM_INT);
                    $stmt -> execute();
                    $this -> Estado = true;
                } catch (PDOException $ex) {
                    echo "Hay un error en el dao de producto " . $ex -> getMessage();
                }
                return $this -> Estado;
            
        }

        public function mdlConsultarProveedor(){
            $sql = "CALL splConsultarProveedor()";
            $resultset = false;
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                
            }
            catch(Exception $e){
                echo "Error al listar proveedores";
            }
            return $resultset;
        }

        public function mdlEliminarProveedor(){
            $sql = "CALL splEliminarProveedor(?)";
            $this -> Estado = False;
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codProveedor, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
            }
            catch(Exception $e){
                echo "ERROR AL ELIMINAR PROVEEDOR" . $e->getMessage();
    
    
            }
        }    

        public function mdlModificarProveedor(){
            $sql = "CALL splModificarProveedor(?,?,?,?,?,?)";
            $this -> Estado = false;
            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam ( 1, $this->codProveedor, PDO::PARAM_INT);
                $stmt -> bindParam ( 2, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam ( 3, $this->NIT, PDO::PARAM_INT);
                $stmt -> bindParam ( 4, $this->Empresa,  PDO::PARAM_STR);
                $stmt -> bindParam ( 5, $this->Direccion, PDO::PARAM_STR );
                $stmt -> bindParam ( 6, $this->Telefono,  PDO::PARAM_INT);
                $stmt -> execute();
                $this -> Estado = true;
            } catch (PDOException $ex) {
                echo "Hay un error en el dao de producto " . $ex -> getMessage();
            }
            return $this -> Estado;
        }//FIN DE MODIFICAR PRODUCTO
    
    

   
    }  
?>