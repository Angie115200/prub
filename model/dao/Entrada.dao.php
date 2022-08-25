<?php

    class ModelEntrada{


        public function __construct($objDtoEntrada){
            $this -> codEntrada = $objDtoEntrada -> getCodEntrada();
            $this -> cantidadT = $objDtoEntrada -> getCantidadT();
            $this -> precioTotal = $objDtoEntrada -> getPrecioT();
            $this -> fecha = $objDtoEntrada -> getFecha();
            $this -> codEmpleado = $objDtoEntrada -> getCodE();
        }

        public function mdlConsultarEntrada(){
            $sql = "CALL splConsultarEntrada()";
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

        public function mdlEliminarEntrada(){
            $sql = "CALL splEliminarEntrada(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codEntrada, PDO::PARAM_INT);
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