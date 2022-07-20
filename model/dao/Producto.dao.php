<?php
    
    class ModelProducto{
        private $CodProducto;
        private $Nombre;
        private $Referencia;
        private $Cantidad;
        private $Disponibilidad;

        public function __construct($objDtoProducto){
            $this->CodProducto = $objDtoProducto -> getCodProducto();
            $this->Nombre = $objDtoProducto -> getNombre();
            $this->Referencia = $objDtoProducto -> getReferencia();
            $this->Cantidad = $objDtoProducto -> getCantidad();
            $this->Disponibilidad = $objDtoProducto -> getDisponibilidad();
        }
        public function mdlInsertarProducto(){
            $sql = "CALL spInsertarProducto( ?, ?, ?, ? );";
            $this -> estado = false;
            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam ( 1, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam ( 2, $this->Referencia, PDO::PARAM_STR);
                $stmt -> bindParam ( 3, $this->Cantidad,  PDO::PARAM_INT);
                $stmt -> bindParam ( 4, $this->Disponibilidad,  PDO::PARAM_INT);
                $stmt -> execute();
                $this -> estado = true;
            } catch (PDOException $ex) {
                echo "Hay un error en el dao de producto " . $ex -> getMessage();
            }
            return $this -> estado;
        }//FIN DE INSERTAR PRODUCTO

        public function mdlConsultarProducto(){
            $sql = "CALL splConsultarProducto()";
            $resultset = false;
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                
            }
            catch(Exception $e){
                echo "Error al listar empleados";
            }
            return $resultset;
        }

        public function mdlEliminarProducto(){
            $sql = "CALL splEliminarProducto(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->CodProducto, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . getMessage()->$e;
        }
        return $this-> Estado;
        
        }
    }


    






    
?>