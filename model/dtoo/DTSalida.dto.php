<?php


    class DTSalida{
        private $codDTSalida;//creamos las variables
        private $CantidadUni;
        private $CodProducto;
        private $CodSalida;
    
    
        public function __construct($codDTSalida, $CantidadUni, $CodProducto, $CodSalida){//creamos un metodo de arranque
            $this->codDTSalida = $codDTSalida;
            $this->CantidadUni = $CantidadUni;
            $this->CodProducto = $CodProducto;
            $this->CodSalida = $CodSalida;
        }
    
        public function setCodDTSalida($codDTSalida){//capturamos los datos
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

        public function getCodDTSalida(){//retornamos los datos
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