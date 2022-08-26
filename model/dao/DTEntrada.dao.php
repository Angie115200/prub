<?php

    class ModelDTEntrada{

        public function __construct($objDtoDTEntrada){
            $this->codDTEntrada = $objDtoDTEntrada -> getCodDTEntrada();
            $this->codEntrada = $objDtoDTEntrada -> getCodEntrada();
            $this->codProducto = $objDtoDTEntrada -> getCodProducto();
            $this->cantidadUni = $objDtoDTEntrada -> getCantidadUni();
            $this->precioUni = $objDtoDTEntrada -> getPrecioUni();
            $this->subtotal = $objDtoDTEntrada -> getSubtotal();
        }


        public function mdlConsultarDTEntrada(){
            $_SESSION['numE'];  
            $CodEntrada = $_SESSION['numE'];
            $sql = "CALL splConsultarDTEntrada($CodEntrada)";
            $resultset = false;
            
        
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                unset($_SESSION['num']);
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $resultset;
        }

        public function mdlEliminarDTEntrada(){
            $sql = "CALL splEliminarDTEntradaU(?)";
            $this->Estado = False;
    
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codDTEntrada, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL TRASLADO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }

        
    }





?>