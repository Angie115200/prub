<?php
    //CONTROLADOR
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";
    require_once "controller/producto.controller.php";
    require_once "controller/proveedor.controller.php";
    require_once "controller/usuario.controller.php";
    //MODELO
    require_once "model/conexion.php";
    require_once "model/dao/conexion.dao.php";
    require_once "model/dao/Producto.dao.php";
    require_once "model/dtoo/Producto.dto.php";
    require_once "model/dao/Proveedor.dao.php";
    require_once "model/dtoo/Proveedor.dto.php";
    require_once "model/dtoo/Usuario.dto.php";
    require_once "model/dao/Usuario.dao.php";
   
    //require_once "view/modules/login.php";
   
    $objPlantilla = new PlantillaControler();
    $objPlantilla -> ctrPlantilla();

?>