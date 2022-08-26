<?php

    class ModelDTTraslado{

        private $codDTTraslado;
        private $cantidadUni;
        private $codProd;
        private $codTraslado;//CREAR VARIABLES

        public function __construct($objDtoDTTraslado){
            $this->codDTTraslado = $objDtoDTTraslado -> getCodDTTraslado();
            $this->cantidadUni = $objDtoDTTraslado -> getCantidadU();
            $this->codProd = $objDtoDTTraslado -> getCodProd();
            $this->codTraslado = $objDtoDTTraslado -> getCodTraslado();
        }
    
      public function mdlConsultarDTTraslado(){
            $_SESSION['numT'];  
            $CodSalida = $_SESSION['numT'];
            $sql = "CALL splConsultarDTTraslado($CodSalida)";
            $resultset = false;
            
        
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                unset($_SESSION['numT']);
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $resultset;
        }
    
    
    }
  
?>