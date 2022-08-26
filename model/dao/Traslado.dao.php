<?php

    class ModelTraslado{

        public function __construct($objDtoTraslado){
            $this->codTraslado = $objDtoTraslado -> getCodTraslado();
            $this->fechaTraslado = $objDtoTraslado -> getFechaT();
            $this->cantidadTotal = $objDtoTraslado -> getCantidadT();
            $this->codE = $objDtoTraslado -> getCodE();
            $this->codBod = $objDtoTraslado -> getCodBod();
        }

        public function mdlConsultarTraslado(){
            $sql = "CALL splConsultarTraslado()";
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

        public function mdlEliminarTraslado(){
            $sql = "CALL splEliminarTraslado(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codTraslado, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL TRASLADO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }

        public function mdlEliminarDTTraslado(){

            $sql = "CALL splEliminarDTTraslado(?)";
            $this->Estado = False;
    
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codTraslado, PDO::PARAM_INT);
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