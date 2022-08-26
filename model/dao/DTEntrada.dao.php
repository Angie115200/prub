<?php

    class ModelDTEntrada{
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
    }





?>