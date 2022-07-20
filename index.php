<?php
    //CONTROLADOR
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";

    //MODELO
    require_once "model/conexion.php";
    require_once "model/dao/conexion.dao.php";
    //require_once "view/modules/login.php";
   
    $objPlantilla = new PlantillaControler();
    $objPlantilla -> ctrPlantilla();

?>