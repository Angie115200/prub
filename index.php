<?php
    //CONTROLADOR
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";
    require_once "controller/producto.controller.php";
    require_once "controller/proveedor.controller.php";
    require_once "controller/usuario.controller.php";
    require_once "controller/entrada.controller.php";
    require_once "controller/DTEntrada.controller.php";
    require_once "controller/DTSalida.controller.php";
    require_once "controller/Salida.controller.php";
    //MODELO
    require_once "model/conexion.php";
    require_once "model/dao/conexion.dao.php";
    require_once "model/dao/Producto.dao.php";
    require_once "model/dtoo/Producto.dto.php";
    require_once "model/dao/Proveedor.dao.php";
    require_once "model/dtoo/Proveedor.dto.php";
    require_once "model/dtoo/Usuario.dto.php";
    require_once "model/dao/Usuario.dao.php";
    require_once "model/dtoo/Entrada.dto.php";
    require_once "model/dao/Entrada.dao.php";
    require_once "model/dtoo/DTEntrada.dto.php";
    require_once "model/dao/DTEntrada.dao.php";
    require_once "model/dao/Salida.dao.php";
    require_once "model/dtoo/Salida.dto.php";
    require_once "model/dao/DTSalida.dao.php";
    require_once "model/dtoo/DTSalida.dto.php";
    require_once "model/dao/SalidaI.dao.php";
    require_once "model/dao/EntradaI.dao.php";
    require_once "model/dao/DevolucionI.dao.php";
  
    
   
    $objPlantilla = new PlantillaControler();
    $objPlantilla -> ctrPlantilla();

?>