<?php

    class Traslado{//CREAR CLASE

        private $codTraslado;//CREAR VARIABLES
        private $fechaTraslado;
        private $cantidadTotal;
        private $codE;
        private $codBod;

        public function __construct($codTraslado, $fechaTraslado, $cantidadTotal, $codE, $codBod){//METODO DE ARRANQUE
            $this->codTraslado = $codTraslado;
            $this->fechaTraslado = $fechaTraslado;
            $this->cantidadTotal = $cantidadTotal;
            $this->codE = $codE;
            $this->codBod = $codBod;
        }
        
        //CAPTURAR DATOS
        public function setCodTraslado($codTraslado){
            $this->codTraslado = $codTraslado;
        }
        public function setFechaT($fechaTraslado){
            $this->fechaTraslado = $fechaTraslado;
        }
        public function setCantidadT($cantidadTotal){
            $this->cantidadTotal = $cantidadTotal;
        }
        public function setCodE($codE){
            $this->codE = $codE;
        }
        public function setCodBod($codBod){
            $this->codBod = $codBod;
        }

        //RETORNAR DATOS

        public function getCodTraslado(){
            return $this->codTraslado;
        }
        public function getFechaT(){
            return $this->fechaTraslado;
        }
        public function getCantidadT(){
            return $this->cantidadTotal;
        }
        public function getCodE(){
            return $this->codE;
        }
        public function getCodBod(){
            return $this->codBod;
        }
    }



?>  