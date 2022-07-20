<?php

    require_once "header.php";
    require_once "Iusuario.php";
    if(isset($_GET['ruta='])){
        switch ($_GET['ruta=']) {
            case 'producto':
                require_once "view/module/RegistroP.php";
                break;}}
    else{
        require_once "Iusuario.php";
    }

    /*if (isset($_GET['ruta'])){
        switch ($_GET['ruta']) {
            case 'producto':
                require_once "view/module/RegistroP.php";
                break;
        }}*/
?>