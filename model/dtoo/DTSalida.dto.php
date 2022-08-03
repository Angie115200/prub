<?php


    class DTSalida{
        private $codDTSalida;
        private $CantidadUni;
        private $CodProducto;
        private $CodSalida;
    
    
        public function __construct($codDTSalida, $CantidadUni, $CodProducto, $CodSalida){
            $this->codDTSalida = $codDTSalida;
            $this->CantidadUni = $CantidadUni;
            $this->CodProducto = $CodProducto;
            $this->CodSalida = $CodSalida;
        }
    
        public function setCodDTSalida($codDTSalida){
            $this->codDTSalida = $codDTSalida;
        }
        public function setCantidadUni($CantidadUni){
            $this->CantidadUni = $CantidadUni;
        }
        public function setCodProducto($CodProducto){
            $this->CodProducto = $CodProducto;
        }
        public function setCodSalida($CodSalida){
            $this->CodSalida = $CodSalida;
        }

        public function getCodDTSalida(){
            return $this->codDTSalida;
        }
        public function getCantidadUni(){
            return $this->CantidadUni;
        }
        public function getCodProducto(){
            return $this->CodProducto;
        }
        public function getCodSalida(){
            return $this->CodSalida;
        }
    }
   
?>