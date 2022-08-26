<?php

    class Devolucion{//CREACION DE CLASE
        private $codDev;//CREAR VARIABLES 
        private $cantTD;
        private $FechaD;
        private $ModD;
        private $codE;
        private $codProv;

        public function __construct($codDev, $cantTD, $FechaD, $ModD, $codE, $codProv){//METODO DE ARRANQUE
            $this->codDev = $codDev;
            $this->cantTD = $cantTD;
            $this->FechaD = $FechaD;
            $this->ModD = $ModD;
            $this->codE = $codE;
            $this->codProv = $codProv;
        }

        //CAPTURA DE DATOS
        public function setCodDev($codDev){
            $this->codDev = $codDev;
        }
        public function setCanTD($cantTD){
            $this->cantTD = $cantTD;
        }
        public function setFechaD($FechaD){
            $this->FechaD = $FechaD;
        }
        public function setModD($ModD){
            $this->ModD = $ModD;
        }
        public function setCodE($codE){
            $this->codE = $codE;
        }
        public function setCodProv($codProv){
            $this->codProv = $codProv;
        }

        //RETORNAR DATOS
        public function getCodDev(){
            return $this->codDev;
        }
        public function getCanTD(){
            return $this->cantTD;
        }
        public function getFechaD(){
            return $this->FechaD;
        }
        public function getModD(){
            return $this->ModD;
        }
        public function getCodE(){
            return $this->codE;
        }
        public function getCodProv(){
            return $this->codProv;
        }
    }

?>