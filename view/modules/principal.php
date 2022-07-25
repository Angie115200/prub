<?php
require_once "view/modules/header.php";

if (isset($_GET['ruta'])){
    switch ($_GET['ruta']) {
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

        case 'usuario':
            require_once "view/modules/registro.php";
            break;
        case 'Conusuario':
            require_once "view/modules/consultaU.php";
            break;
        
        case 'Modusuario':
            require_once "view/modules/modificarU.php";
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