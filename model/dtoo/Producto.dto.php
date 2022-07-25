<?php

    class Producto{
        private $CodProducto;
        private $Nombre;
        private $Referencia;
        private $Cantidad;
        private $Disponibilidad;
    
        //METODO DE ARRANQUE
    
       public function __construct($CodProducto, $Nombre, $Referencia, $Cantidad, $Disponibilidad){
            $this->CodProducto = $CodProducto;
            $this->Nombre = $Nombre;
            $this->Referencia = $Referencia;
            $this->Cantidad = $Cantidad;
            $this->Disponibilidad = $Disponibilidad;
        }

    
        //CAPTURA DE DATOS
        public function setCodProducto($CodProducto){
            $this->CodProducto = $CodProducto;
        }

    
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }
    
        public function setReferencia($Referencia){
            $this->Referencia = $Referencia;
        }
    
        public function setCantidad($Cantidad){
            $this->Cantidad = $Cantidad;
        }
    
        public function setDisponibilidad($Disponibilidad){
            $this->Disponibilidad = $Disponibilidad;
        }
    
        //ACCEDER A LOS DATOS
    
        public function getCodProducto(){
            return $this->CodProducto;
        }
        public function getNombre(){
            return $this->Nombre;
        }
        public function getReferencia(){
            return $this->Referencia;
        }
        public function getCantidad(){
            return $this->Cantidad;
        }
        public function getDisponibilidad(){
            return $this->Disponibilidad;
        }
    }
   






    
?>

