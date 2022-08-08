<?php

    class Producto{
        private $CodProducto;//creamos las variables
        private $Nombre;
        private $Referencia;
        private $Cantidad;
        private $Disponibilidad;
    
        //METODO DE ARRANQUE
    
       public function __construct($CodProducto, $Nombre, $Referencia, $Disponibilidad){
            $this->CodProducto = $CodProducto;
            $this->Nombre = $Nombre;
            $this->Referencia = $Referencia;
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
    
    
        public function setDisponibilidad($Disponibilidad){
            $this->Disponibilidad = $Disponibilidad;
        }
    
        //RETORNAMOS LOS DATOS
    
        public function getCodProducto(){
            return $this->CodProducto;
        }
        public function getNombre(){
            return $this->Nombre;
        }
        public function getReferencia(){
            return $this->Referencia;
        }
        public function getDisponibilidad(){
            return $this->Disponibilidad;
        }
    }
   






    
?>

