<?php

    class ModelDTDevolucion{
        private $codDTDev;//CREACION DE VARIABLES
        private $cantidadUni;
        private $codProd;
        private $codDev;

        public function __construct($objDtoDTDevolucion){//METODO DE ARRANQYE
            $this->codDTDev = $objDtoDTDevolucion -> getCodDTDev();
            $this->cantidadUni = $objDtoDTDevolucion -> getCantUni();
            $this->codProd = $objDtoDTDevolucion -> getCodProd();
            $this->codDev =  $objDtoDTDevolucion -> getCodDev();
        }

        public function mdlConsultarDTDevolucion(){
            $_SESSION['numD'];  
            $CodDev = $_SESSION['numD'];
            $sql = "CALL splConsultarDTDevolucion($CodDev)";
            $resultset = false;
            
        
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                unset($_SESSION['numD']);
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $resultset;
        }

        public function mdlEliminarDTDevolucion(){
            $sql = "CALL splEliminarDTDevolucionU(?)";
            $this->Estado = False;
    
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codDTDev, PDO::PARAM_INT);
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