<?php

    class DTTraslado{//CREAR CLASE

        private $codDTTraslado;
        private $cantidadUni;
        private $codProd;
        private $codTraslado;//CREAR VARIABLES
        

        public function __construct($codDTTraslado, $cantidadUni, $codProd, $codTraslado){//METODO DE ARRANQUE
           
            $this->codDTTraslado = $codDTTraslado;
            $this->cantidadUni = $cantidadUni;
            $this->codProd = $codProd;
            $this->codTraslado = $codTraslado;
        }
        
        //CAPTURAR DATOS
        public function setCodDTTraslado($codDTTraslado){
             $this->codDTTraslado = $codDTTraslado;
        }
        public function setCantidadU($cantidadUni){
            $this->cantidadUni = $cantidadUni;
        }
        public function setCodProd($codProd){
            $this->codProd = $codProd;
        }
        public function setCodTraslado($codTraslado){
            $this->codTraslado = $codTraslado;
        }

        //RETORNAR DATOS

        public function getCodDTTraslado(){
            return $this->codDTTraslado;
       }
       public function getCantidadU(){
            return $this->cantidadUni;
       }
       public function getCodProd(){
            return $this->codProd;
       }
       public function getCodTraslado(){
            return $this->codTraslado;
       }
    }



?>  