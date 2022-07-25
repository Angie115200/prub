<?php
    //session_start();
    class ConexionController{
        public function ctrLogin($Nombre, $Contra, $Rol){

            $objModConexion = new ModelConexion($Nombre, $Contra, $Rol, $codEmpleado);
            $rest = $objModConexion -> getLogin() -> fetch();
            if(gettype($rest) != "boolean"){ // YES FIND

                $_SESSION["login"] = true;
                $_SESSION['Nombre'] = $Nombre;
                $_SESSION['cod'] = $codEmpleado;
                header("location:index.php");
              /*  if($Rol == 1){
                    header("Location:http://localhost:8080/GINVZ1/view/modules/Iadmin.php");
                    echo "<script>alert('YA HA INGRESASDO ADMIN');</script>";
                    //include_once("admin.php");
                }
                else{
                    header("Location:http://localhost:8080/GINVZ1/view/modules/principal.php");
                    echo "<script>alert('BIENVENIDO USUARIO');</script>";
                   
                }*/
               
               
               
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

