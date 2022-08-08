<?php


    class PlantillaControler{//Creamos la clase
        public function ctrPlantilla(){
            
            if ( isset($_SESSION["login"]) and $_SESSION["login"] == true){//Si la session es verdadera envie a principal
                    include_once "view/modules/principal.php";
            }
                else{
                    include_once "view/modules/login.php";
                }
               
            }
        }
     
    
   /* if(!isset($_SESSION['datos'])){
        echo "SI";
    }
    else{
        print_r($_SESSION['datos']);
    }
    
  
}else{*/
?>

