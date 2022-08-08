<?php

 
    class ModelConexion{
        private $codEmpleado;
        private $Nombre;
        private $Contra;
        private $Rol;
 
        public function __construct($Nombre, $Contra, $Rol){//Creamos un metodo de arranque
            $this -> Nombre = $Nombre;
            $this -> Contra = $Contra;
            $this -> Rol = $Rol;
            
           
        }//END CONSTRUCT
      
        public function getLogin(){//Creamos la funcion que permitira el ingreso a la plataforma
            
            $resultSet = false;

            $sql = "SELECT * FROM EMPLEADO
            WHERE NOMBRE = ? AND CONTRASEÑA = ? AND COD_ROL = ? ";//por medio de sql le enviamos una consulta
            
            try {//Si no hay un error realice los siguiente
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos la consulta
                $stmt -> bindParam(1, $this -> Nombre, PDO::PARAM_STR);//Almacenamos los parametros a consultar
                $stmt -> bindParam(2, $this -> Contra, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> Rol, PDO::PARAM_INT);
                $stmt -> execute();//Ejecutamos la consulta
                
                $resultSet = $stmt;
              
            
                
            } catch (PDOException $e) {//En caso de un error envia un mensaje
                echo "Error en el metodo buscar password " . $e->getMessage();
            }
            return $resultSet;
            
        }
       
    }


?>