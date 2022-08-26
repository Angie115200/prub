<?php

    class ModelDevolucion{
        private $codDev;//CREAR VARIABLES 
        private $cantTD;
        private $FechaD;
        private $ModD;
        private $codE;
        private $codProv;

        public function __construct($objDtoDevolucion){//METODO DE ARRANQUE
            $this->codDev = $objDtoDevolucion -> getCodDev();
            $this->cantTD = $objDtoDevolucion -> getCanTD(); 
            $this->FechaD = $objDtoDevolucion -> getFechaD(); 
            $this->ModD = $objDtoDevolucion -> getModD(); 
            $this->codE = $objDtoDevolucion -> getCodE(); 
            $this->codProv = $objDtoDevolucion -> getCodProv(); 
    }

        public function mdlConsultarDevolucion(){
            $sql = "CALL splConsultarDevolucion()";
            $resultset = false;
            
        
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $resultset;
        }

        public function mdlEliminarDevolucion(){
            $sql = "CALL splEliminarDevolucion(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codDev, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }
        public function mdlEliminarDTDevolucion(){
            $sql = "DELETE FROM `detalle_devolucion` WHERE `COD_DEVOLUCION` = ?";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codDev, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }
    }



?>