<?php

    class ModelEntrada{
        private $codEntrada;
        private $cantidadT;
        private $fecha;
        private $hora;
        private $precioTotal;
        private $codEmpleado;
        private $Estado;

        public function __construct($objDtoEntrada){
            $this -> codEntrada = $objDtoEntrada->getCodEntrada();
            $this -> cantidadT = $objDtoEntrada->getCantidadT();
            $this -> precioTotal = $objDtoEntrada->getPrecioT();
            $this -> fecha = $objDtoEntrada->getFecha();
            $this -> hora = $objDtoEntrada->getHora();
            $this -> codEmpleado = $objDtoEntrada->getCodE();
        }

        public function mdlInsertarEntrada(){
            $sql = "CALL spInsertarEntrada(?,?,?,?,?)";
            $this->Estado = false;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->cantidadT, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->precioTotal, PDO::PARAM_INT);
                $stmt -> bindParam(3, $this->fecha, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->hora, PDO::PARAM_INT);
                $stmt -> bindParam(5, $this->codEmpleado, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;

            }
            catch(Exception $e){
                echo "ERROR EN EL DAO DE ENTRADA". $e->getMessage();
            }
        }
    }
    /*$objDtoEntrada = new Entrada();
    $objDaoEntrada = new ModelEntrada($objDtoEntrada);
    //$objDtoEntrada -> setCodEntrada(120);
    $objDtoEntrada -> setCantidadT(20);
    $objDtoEntrada -> setFecha("2222-07-11");
    $objDtoEntrada -> setHora("22:03");
    $objDtoEntrada -> setCodE(12);
    $objDtoEntrada -> setPrecioT(200000);
    //echo $objDtoEntrada->getCodE();
    $objDtoEntrada->getCantidadT();
    $objDtoEntrada->getPrecioT();
    $objDtoEntrada->getHora();
    $objDtoEntrada->getFecha();
    $objDtoEntrada->getCodE();
    
    if($objDaoEntrada -> mdlInsertarEntrada()){
        echo "INSERTO";
    }
    else{
        echo "NO INSERTO";
    }*/

?>