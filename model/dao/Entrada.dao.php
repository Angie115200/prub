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

    }


?>