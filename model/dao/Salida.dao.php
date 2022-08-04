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

      /*  public function mdlInsertarSalida(){
          /*  $sql = "CALL splInsertarSalida(?,?)";
            $this->Estado = false;
                try{
                    $con = new Conexion();
                    $stmt = $con -> conexion() -> prepare($sql);
                    $stmt -> bindParam(1, $this->CantT, PDO::PARAM_INT);
                    $stmt -> bindParam(2, $this->codE, PDO::PARAM_INT);
                    $stmt -> execute();
                    $this->Estado = true;
       
    
                }
                
            catch(Exception $e){
                echo "ERROR EN EL DAO SALIDA" . $e->getMessage();
            }
            $bd = new PDO('mysql:host=localhost; dbname =GINVZ', 'root','');
            $codE = $_SESSION['datos']['COD_EMPLEADO'];
            echo $codE;
            $stmt = $bd->prepare("INSERT INTO `salida`(`COD_EMPLEADO`, 'CANTIDAD_TOTAL') VALUES (3, 100)");
            $stmt -> execute();
            $id = $bd->lastInsertId();
            //echo $id;
           
        }*/
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