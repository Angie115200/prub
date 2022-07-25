<?php
  
    
    class RegistroEmp
    {
        private $codEmpleado;//Definimos las variables
        private $Nombre;
        private $Rol;
        private $Contra;
        private $Apellido;
        private $Telefono;
        private $Confirmacion;
        private $Cedula;
        private $Correo;
       
      public function __construct($codEmpleado, $Nombre, $Apellido,$Cedula, $Telefono,$Correo,$Contra, $Confirmacion , $Rol){
            $this ->codEmpleado = $codEmpleado;
            $this->Nombre = $Nombre;
            $this->Rol = $Rol;
            $this->Contra = $Contra;
            $this->Apellido = $Apellido;
            $this->Telefono = $Telefono;
            $this->Confirmacion = $Confirmacion;
            $this->Cedula = $Cedula;
            $this->Correo = $Correo;
        }
      
       
  
        public function setCodEmpleado($codEmpleado){//Capturamos los datos
            $this->codEmpleado = $codEmpleado;
        }
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }
        public function setRol($Rol){
            $this->Rol = $Rol;
        }
        public function setContra($Contra){
            $this->Contra = $Contra;
        }
        public function setConfirmacion($Confirmacion){
            $this->Confirmacion = $Confirmacion;
        }
        public function setApellido($Apellido){
            $this->Apellido = $Apellido;
        }
        public function setTelefono($Telefono){
            $this->Telefono = $Telefono;
        }
        public function setCedula($Cedula){
            $this->Cedula = $Cedula;
        }
        public function setCorreo($Correo){
            $this->Correo = $Correo;
        }
       

        public function getCodEmpleado(){//Obetenemos el valor de las propiedades
            return $this->codEmpleado;
        }
        public function getNombre(){
            return $this->Nombre;
        }
        public function getRol(){
            return $this->Rol;
        }
        public function getContra(){
            return $this->Contra;
        }
        public function getConfirmacion(){
            return $this->Confirmacion;
        }
        public function getApellido(){
            return $this->Apellido;
        }
        public function getTelefono(){
            return $this->Telefono;
        }
        public function getCedula(){
            return $this->Cedula;
        }
        public function getCorreo(){
            return $this->Correo;
        }
      
    }