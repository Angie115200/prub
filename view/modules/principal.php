<?php
require_once "view/modules/header.php";

if (isset($_GET['ruta'])){
    switch ($_GET['ruta']) {
        case 'Datos':
            include_once "view/modules/datosU.php";
            break;
        case 'Prueba':
            include_once "view/modules/prueba.php";
            break;
        case 'Entrada':
            include_once("view/modules/entrada.php");
            break;
        case 'producto':
           include_once("view/modules/registroProd.php");
            break;
            
        case 'Conproducto':
            require_once "view/modules/consultaProd.php";
            break;
        case 'proveedor':
            require_once "view/modules/registroProov.php";
            break;
            
        case 'Conproveedor':
            require_once "view/modules/consultarProvee.php";
            break;
        
        case 'ConsultaS':
                require_once "view/modules/consultaSalida.php";
                break;

        case 'usuario':
            if($_SESSION['datos']['COD_ROL'] == 2){
                echo '<script language="javascript">alert("USTED NO TIENE ACCESO A ESTA SECCION");</script>';
            }
            else{
                require_once "view/modules/registro.php";
            }
           
            break;
        case 'Conusuario':
            if($_SESSION['datos']['COD_ROL'] == 2){
                echo '<script language="javascript">alert("USTED NO TIENE ACCESO A ESTA SECCION");</script>';
            }
            else{
                require_once "view/modules/consultaU.php";
            }
           
            break;
        case 'Salida':
            require_once "view/modules/salida.php";
            break;
        
      
        /*default:
            require_once "view/module/presentation.php";
            break;*/
    }/*
}else{
    require_once "view/module/presentation.php";
}
require_once "view/module/footer.php";
?>
*/}

?>