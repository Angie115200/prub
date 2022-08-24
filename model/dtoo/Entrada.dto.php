<?php

    class Entrada{
        private $codEntrada;//creamos las variables
        private $cantidadT;
        private $fecha;
        private $hora;
        private $precioTotal;
        private $codEmpleado;
    
        public function __construct($codEntrada, $cantidadT,$precioTotal, $fecha, $codEmpleado){//creamos un metodo de arranque
            $this -> codEntrada = $codEntrada;
            $this -> cantidadT = $cantidadT;
            $this -> precioTotal = $precioTotal;
            $this -> fecha = $fecha;
            $this -> codEmpleado = $codEmpleado;
            
           
        }
    //capturamos los datos
        public function setCodEntrada($codEntrada){
            $this -> codEntrada = $codEntrada;
        }
        public function setCantidadT($cantidadT){
            $this -> cantidadT = $cantidadT;
        }
        public function setCodE($codEmpleado){
            $this -> codEmpleado = $codEmpleado;
        }
        public function setFecha($fecha){
            $this -> fecha = $fecha;
        }
        public function setHora($hora){
            $this -> hora = $hora;
        }
        public function setPrecioT($precioTotal){
            $this-> precioTotal = $precioTotal;
        }
        //retornamos los datos
        public function getCodEntrada(){
            return $this->codEntrada;
        }
        public function getCantidadT(){
            return $this->cantidadT;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getCodE(){
            return $this->codEmpleado;
        }
        public function getHora(){
            return $this->hora;
        }
        public function getPrecioT(){
            return $this->precioTotal;
        }
    
    }

    /*$objDtoEntrada = new Entrada();
    $objDtoEntrada -> setCodEntrada(120);
    $objDtoEntrada -> setCantidadT(20);
    $objDtoEntrada -> setFecha("22/07");
    $objDtoEntrada -> setHora("22:03");
    $objDtoEntrada -> setCodE(12);
    $objDtoEntrada -> setPrecioT("200,000");
    echo $objDtoEntrada->getCodE();
    echo $objDtoEntrada->getCantidadT();
    echo $objDtoEntrada->getPrecioT();
    echo $objDtoEntrada->getHora();
    echo $objDtoEntrada->getFecha();
    echo $objDtoEntrada->getCodEntrada();*/


?>