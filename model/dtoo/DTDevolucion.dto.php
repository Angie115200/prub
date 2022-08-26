<?php


    class DTDevolucion{//CREARCION DE CLASE
        private $codDTDev;//CREACION DE VARIABLES
        private $cantidadUni;
        private $codProd;
        private $codDev;

        public function __construct($codDTDev, $cantidadUni, $codProd, $codDev){//METODO DE ARRANQYE
            $this->codDTDev = $codDTDev;
            $this->cantidadUni = $cantidadUni;
            $this->codProd = $codProd;
            $this->codDev = $codDev;
        }

        //CAPTURA DE DATOS

        public function setCodDTDev($codDTDev){
            $this->codDTDev = $codDTDev;
        }
        public function setCantUni($cantidadUni){
            $this->cantidadUni = $cantidadUni;
        }
        public function setCodProd($codProd){
            $this->codProd = $codProd;
        }
        public function setCodDev($codDev){
            $this->codDev = $codDev;
        }

        //RETORNO DE DATOS

        public function getCodDTDev(){
           return $this->codDTDev;
        }
        public function getCantUni(){
            return $this->cantidadUni;
        }
        public function getCodProd(){
            return $this->codProd;
        }
        public function getCodDev(){
            return $this->codDev;
        }





    }


?>
