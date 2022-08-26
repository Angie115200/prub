<?php
    
    class ModelDTSalida{
        
        private $codDTSalida;
        private $CantidadUni;
        private $CodProducto;
        private $CodSalida;
        private $Estado;
        

        public function __construct($objDtoDTSalida){
            $this->codDTSalida = $objDtoDTSalida -> getCodDTSalida();
            $this->CantidadUni = $objDtoDTSalida -> getCantidadUni();
            $this->CodProducto = $objDtoDTSalida -> getCodProducto();
            $this->CodSalida = $objDtoDTSalida -> getCodSalida();
        }

      
       
    public function mdlConsultarDTSalida(){
        $_SESSION['num'];  
        //echo $_SESSION['num'];
        $CodSalida = $_SESSION['num'];
        $sql = "CALL splConsultarDTSalida($CodSalida)";
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