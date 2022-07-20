<?php
    //session_start();
    class ConexionController{
        public function ctrLogin($Cedula, $Contra, $Rol){

            $objModConexion = new ModelConexion($Cedula, $Contra, $Rol);
            $rest = $objModConexion -> getLogin() -> fetch();
            if(gettype($rest) != "boolean"){ // YES FIND

                $_SESSION["login"] = true;

                if($Rol == 1){
                    header("Location:http://localhost:8080/GINVZ1/view/modules/Iadmin.php");
                    echo "<script>alert('YA HA INGRESASDO ADMIN');</script>";
                    //include_once("admin.php");
                }
                else{
                    header("Location:http://localhost:8080/GINVZ1/view/modules/principal.php");
                    echo "<script>alert('BIENVENIDO USUARIO');</script>";
                   
                }
               
               
               
            }else{
                echo "<script>
                Swal.fire(
                    'Error?',
                    'The password wrong?',
                    'error'
                  )
                ;</script>";
            }
        }
    }

?>