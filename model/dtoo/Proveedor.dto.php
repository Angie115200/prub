<?php

    class Proveedor{
        private $codProveedor;
        private $Nombre;
        private $NIT;
        private $Telefono;
        private $Empresa;
        private $Direccion;

      public function __construct($codProveedor, $Nombre, $NIT, $Empresa, $Direccion,$Telefono){
            $this->codProveedor = $codProveedor;
            $this->Nombre = $Nombre;
            $this->NIT = $NIT;
            $this->Empresa = $Empresa;
            $this->Direccion = $Direccion;
            $this->Telefono = $Telefono;
        }

        public function setCodProov($codProveedor){
            $this->codProveedor = $codProveedor;
        }
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }
        public function setNIT($NIT){
            $this->NIT = $NIT;
        }
        public function setTelefono($Telefono){
            $this->Telefono = $Telefono;
        }
        public function setEmpresa($Empresa){
            $this->Empresa = $Empresa;
        }
        public function setDireccion($Direccion){
            $this->Direccion = $Direccion;
        }

        public function getCodProov(){
            return $this->codProveedor;
        }
        public function getNombre(){
            return $this->Nombre;
        }
        public function getNIT(){
            return $this->NIT;
        }
        public function getTelefono(){
            return $this->Telefono;
        }
        public function getEmpresa(){
            return $this->Empresa;
        }
        public function getDireccion(){
            return $this->Direccion;
        }



    }

    
   
    



?>