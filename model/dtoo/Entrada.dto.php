<?php

    class Entrada{
        private $codEntrada;
        private $cantidadT;
        private $fecha;
        private $nombreE;
    
        public function __construct($codEntrada, $cantidadT, $fecha, $nombreE){
            $this -> codEntrada = $codEntrada;
            $this -> cantidadT = $cantidadT;
            $this -> fecha = $fecha;
            $this -> nombreE = $nombreE;
        }

        public function setCodEntrada($codEntrada){
            $this -> codEntrada = $codEntrada;
        }
        public function setCantidadT($cantidadT){
            $this -> cantidadT = $cantidadT;
        }
        public function setFecha($fecha){
            $this -> fecha = $fecha;
        }
        public function getCodEntrada(){
            return $this->codEntrada;
        }
        public function getCantidadT(){
            return $this->cantidadT;
        }
        public function getFecha(){
            return $this->fecha;
        }
    
    
    }

?>