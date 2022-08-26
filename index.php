<?php
    //CONTROLADOR
    require_once "controller/conexion.controller.php";
    require_once "controller/plantilla.controller.php";
    require_once "controller/producto.controller.php";
    require_once "controller/proveedor.controller.php";
    require_once "controller/usuario.controller.php";
    require_once "controller/entrada.controller.php";
    require_once "controller/Salida.controller.php";
    require_once "controller/traslado.controller.php";
    require_once "controller/Devolucion.controller.php";
    //MODELO
    require_once "model/conexion.php";
    require_once "model/dao/conexion.dao.php";
    //MODELO DE PRODUCTOS
    require_once "model/dao/Producto.dao.php";
    require_once "model/dtoo/Producto.dto.php";

    //MODELO DE PROVEEDORES
    require_once "model/dao/Proveedor.dao.php";
    require_once "model/dtoo/Proveedor.dto.php";

    //MODELO DE USUARIOS
    require_once "model/dtoo/Usuario.dto.php";
    require_once "model/dao/Usuario.dao.php";

    //MODELO DE ENTRADA
    require_once "model/dtoo/Entrada.dto.php";
    require_once "model/dtoo/DTEntrada.dto.php";
    require_once "model/dao/Entrada.dao.php";
    require_once "model/dao/EntradaI.dao.php";
    require_once "model/dao/DTEntrada.dao.php";
    //MODELO DE SALIDA
    require_once "model/dao/Salida.dao.php";
    require_once "model/dtoo/Salida.dto.php";
    require_once "model/dao/DTSalida.dao.php";
    require_once "model/dtoo/DTSalida.dto.php";
    require_once "model/dao/SalidaI.dao.php";

    //MODELO DE TRASLADO
    require_once "model/dao/Traslado.dao.php";
    require_once "model/dao/DTTraslado.dao.php";
    require_once "model/dao/TrasladoDT.dao.php";
    require_once "model/dtoo/DTTraslado.dto.php";
    require_once "model/dtoo/Traslado.dto.php";

    //MODELO DE DEVOLUCION
    require_once "model/dao/DevolucionI.dao.php";
    require_once "model/dao/Devolucion.dao.php";
    require_once "model/dtoo/Devolucion.dto.php";
    require_once "model/dtoo/DTDevolucion.dto.php";
    require_once "model/dao/DTDevolucion.dao.php";
    
  
    
   
    $objPlantilla = new PlantillaControler();
    $objPlantilla -> ctrPlantilla();

?>