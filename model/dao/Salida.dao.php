<?php   

    class ModelSalida{
        private $codSalida;
        private $CantT;
        private $FechaS;
        private $Hora;
        private $codE;
        private $Estado;


        public function __construct($objDtoSalida){
            $this->codSalida =$objDtoSalida -> getCodSalida();
            $this->FechaS = $objDtoSalida -> getFechaS(); 
            $this->CantT = $objDtoSalida -> getCantT();
            $this->codE = $objDtoSalida -> getCodE();
        }

        
        public function mdlConsultarSalida(){
            
            $sql = "CALL splConsultarSalida()";
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

        public function mdlEliminarSalida(){
            $sql = "CALL splEliminarSalida(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codSalida, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }
        public function mdlEliminarDTSalida(){
            $sql = "DELETE FROM `detalle_salida` WHERE `COD_SALIDA` = ?";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codSalida, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }
      
    

    }

   /* $objDtoSalida = new Salida();  
    $obDaoSalida = new ModelSalida();
    $objDtoSalida -> setcodE(112);
    $objDtoSalida -> setCodSalida(12);
    $objDtoSalida -> setCanT(20);
    $objDtoSalida -> setFechaS("25-12-20");
    $objDtoSalida -> setHora("20:30");
    $obDaoSalida -> mdlInsertarSalida($obDaoSalida);*/

    //$objDtoSalida = new Salida(null, null, null, null,null);  
    //$objDaoSalida = new ModelSalida($objDtoSalida);
    //$objDaoSalida -> mdlConsultarId();
    //var_dump($objDaoSalida->mdlConsultarId());
?>