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