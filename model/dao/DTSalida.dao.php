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

    

       
        public function mdlConsultarDetalleS(){
            $sql = "SELECT * FROM DETALLE_SALIDA WHERE COD_SALIDA = $CodSalida";
            $Estado = false;
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam ( 1, $this->CodSalida, PDO::PARAM_INT);
                $stmt -> execute();
                $this -> Estado = true;
            }
            catch(Exception $e){
                echo "ERROR EN EL DAO DE CONSULTAR DETALLE" . $e->getMessage();
            }
        }


    }

?>