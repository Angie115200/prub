<?php

 
    class ModelConexion{
        private $codEmpleado;
        private $Nombre;
        private $Contra;
        private $Rol;
 
        public function __construct($Nombre, $Contra, $Rol){
            $this -> Nombre = $Nombre;
            $this -> Contra = $Contra;
            $this -> Rol = $Rol;
            
           
        }//END CONSTRUCT
      
        public function getLogin(){
            
            $resultSet = false;

            $sql = "SELECT * FROM EMPLEADO
            WHERE NOMBRE = ? AND CONTRASEÑA = ? AND COD_ROL = ? ";
            
            try {
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> Nombre, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> Contra, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> Rol, PDO::PARAM_INT);
                $stmt -> execute();
                
                $resultSet = $stmt;
              
            
                
            } catch (PDOException $e) {
                echo "Error en el metodo buscar password " . $e->getMessage();
            }
            return $resultSet;
            
        }
       
    }


?>