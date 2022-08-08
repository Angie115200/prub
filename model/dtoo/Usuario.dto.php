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
       
        //Creamos un metodo de arranque
      public function __construct($codEmpleado, $Nombre, $Apellido,$Cedula, $Telefono,$Correo, $Contra, $Rol ){
            $this ->codEmpleado = $codEmpleado;
            $this->Nombre = $Nombre;
            $this->Apellido = $Apellido;
            $this->Cedula = $Cedula;
            $this->Telefono = $Telefono;
            $this->Correo = $Correo;
            $this->Contra = $Contra;
            $this->Rol = $Rol;
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
       

        public function getCodEmpleado(){//Returnamos los datos
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