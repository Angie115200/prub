<?php
     //include_once "model/conexion.php";
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

       /* public function guardarID(){
            $sql = "SELECT MAX(COD_SALIDA) FROM SALIDA";
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt = execute();
            }
            catch(Exception $e){
                echo "ERROR";
            }

        }
    */

        public function MdlInsertarDTSalida(){
           
            $sql = "CALL splInsertarDTSalida(?,?,?)";
            //$sql = "INSERT INTO DTSALIDA ";
            $this->Estado  = false;

            try{
                
               $con = new Conexion();
               $stmt = $con -> conexion() -> prepare($sql);
                //$stmt = $bd -> prepare($sql);
                //$stmt = $bd;
                $stmt -> bindParam(1, $this->CantidadUni, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->CodProducto, PDO::PARAM_INT);
                $stmt -> bindParam(3, $this->CodSalida, PDO::PARAM_INT);
                $stmt -> execute();
                //$stmt = mysqli_query($sql, $bd); 
                $this->Estado = true;
        
            }
            catch(Exception $e){
                echo "ERROR EN EL DAO";
            }
        }


    }

?>