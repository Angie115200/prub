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

    public function mdlEliminarDTSalida(){
        $sql = "CALL splEliminarDTSalidaU(?)";
        $this->Estado = False;

        try{
            $con = new Conexion();
            $stmt = $con -> conexion() -> prepare($sql);
            $stmt -> bindParam(1, $this->codDTSalida, PDO::PARAM_INT);
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