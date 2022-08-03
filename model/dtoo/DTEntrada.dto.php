<?php

    class DTEntrada{//CREAMOS UNA CLASE
        private $codDTEntrada;
        private $codEntrada;//CREAMOS LAS VARIABLES
        private $codProducto;
        private $cantidadUni;
        private $precioUni;
        private $subtotal;


        public function __construct($codDTEntrada,$codEntrada, $codProducto, $cantidadUni, $precioUni, $subtotal){
            $this->codDTEntrada = $codDTEntrada;
            $this->codEntrada = $codEntrada;
            $this->codProducto = $codProducto;
            $this->cantidadUni = $cantidadUni;
            $this->precioUni = $precioUni;
            $this->subtotal = $subtotal;
        }


        public function setCodDTEntrada(){
            $this->codDTEntrada = $codDTEntrada;
        }
        public function setCodEntrada($codEntrada){//CAPTURAMOS LA INFORMACION
            $this->codEntrada = $codEntrada;
        }
        public function setCodProducto($codProducto){
            $this->codProducto = $codProducto;
        }
        public function setCantidadUni($cantidadUni){
            $this->cantidadUni = $cantidadUni;
        }
        public function setPrecioUni($precioUni){
            $this->precioUni = $precioUni;
        }
        public function setSubtotal($subtotal){
            $this->subtotal = $subtotal;
        }
        public function getCodEntrada(){//RETORNAMOS LA INFORMACION
            return $this->codEntrada;
        }
        public function getCodProducto(){
            return $this->codProducto;
        }
        public function getPrecioUni(){
            return $this->precioUni;
        }
        public function getCantidadUni(){
            return $this->cantidadUni;
        }
        public function getSubtotal(){
            return $this->subtotal;
        }
        public function getCodDTEntrada(){
            return $this->codDTEntrada;
        }
    }

  /*  $objDTEntrada = new DTEntrada();
    $objDTEntrada -> setCodEntrada(1);
    $objDTEntrada -> setCodProducto(1);
    $objDTEntrada -> setCantidadUni(10);
    $objDTEntrada -> setPrecioUni(2000);
    $objDTEntrada -> setSubtotal(20000);
    echo $objDTEntrada -> getCodEntrada();
    echo "<br>" .$objDTEntrada -> getCodProducto();
    echo "<br>" .$objDTEntrada -> getPrecioUni();
    echo "<br>" .$objDTEntrada -> getCantidadUni();
    echo "<br>" .$objDTEntrada -> getSubtotal();*/
?>