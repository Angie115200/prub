<?php
    
    session_start();//Inicializamos la session
    class ConexionController{//Creamos una clase
        public function ctrLogin($Nombre, $Contra, $Rol){//Creamos una funcion para el ingreso al sistema
            $objModConexion = new ModelConexion($Nombre, $Contra, $Rol);
            $rest = $objModConexion -> getLogin() -> fetch();
            $_SESSION['datos'] = $rest;//Guardamos el resultado en una variable de session
            if(gettype($rest) != "boolean"){ 
                
                $_SESSION["login"] = true;//Si la session existe envie al usuario a index

                header("location:index.php");
           
               
            }else{//De otra manera envie una alerta de datos incorrectos
                echo '<script language="javascript">alert("Datos incorrectos");</script>';
            }
        }
    }

?>

