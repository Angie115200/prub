<?php

    class ModelDTEntrada{
        private $codEntrada;//CREAMOS LAS VARIABLES
        private $codProducto;
        private $cantidadUni;
        private $precioUni;
        private $subtotal;
        private $Estado;


       public function __construct($objDtoDTEntrada){
           $this->codDTEntrada = $objDtoDTEntrada -> getCodDTEntrada();
            $this->codEntrada = $objDtoDTEntrada -> getCodEntrada();
            $this->codProducto = $objDtoDTEntrada -> getCodProducto();
            $this->cantidadUni = $objDtoDTEntrada -> getCantidadUni();
            $this->precioUni = $objDtoDTEntrada -> getPrecioUni();
            $this->subtotal = $objDtoDTEntrada -> getSubtotal();
        }


        public function mdlInsertarDTEntrada(){
            $sql = "CALL splInsertarDTEntrada(?,?,?,?,?)";
            $this->Estado = false;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codEntrada, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->codProducto, PDO::PARAM_INT);
                $stmt -> bindParam(3, $this->cantidadUni, PDO::PARAM_INT);
                $stmt -> bindParam(4, $this->precioUni, PDO::PARAM_INT);
                $stmt -> bindParam(5, $this->subtotal, PDO::PARAM_INT);
                $stmt -> execute();
               
                $this->Estado = true;
            }
            catch(Exception $e){
                echo "ERROR";
            }
        }


    }


 

?>