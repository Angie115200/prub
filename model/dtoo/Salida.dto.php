<?php


    class Salida{
        private $codSalida;
        private $CantT;
        private $codE;
    
    
       public function __construct($codSalida, $FechaS, $CantT, $codE){
            $this->codSalida =$codSalida;
            $this->FechaS = $CantT;
            $this->CantT = $CantT;
            $this->codE = $codE;
        }

        public function setCodE($codE){
            $this->codE = $codE;
        }
        public function setCodSalida($codSalida){
            $this->codSalida = $codSalida;
        }
        public function setCanT($CantT){
            $this->CantT = $CantT;
        }
        public function setFechaS($FechaS){
            $this->FechaS = $FechaS;
        }

        public function getCodSalida(){
            return $this->codSalida;
        }
        public function getCantT(){
            return $this->CantT;
        }
        public function getFechaS(){
            return $this->FechaS;
        }
      
        public function getCodE(){
            return $this->codE;
        }

    }
   

    /*$objDtoSalida = new Salida();  
    $objDtoSalida -> setcodE(112);
    $objDtoSalida -> setCodSalida(12);
    $objDtoSalida -> setCanT(20);
    $objDtoSalida -> setFechaS("25-12-20");
    $objDtoSalida -> setHora("20:30");*/
    


?>