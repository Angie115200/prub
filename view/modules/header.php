<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="stylesheet" href="view/css/header.css">
    <script src="https://kit.fontawesome.com/a4c74380b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/css/sweetalert2.min.css">
    <script src="view/js/sweetalert2.all.min.js"></script>
    <script src="view/js/CrudProd.js"></script>
</head>
<body>


    <header>
        <img src="view/img/LOGO.png" alt="">
        <h1>GINVZ</h1>
        <ul class = "nav">
            <li class = "p"><a href="">Productos</a>
                <ul>
                    <li><a href="index.php?ruta=producto">Registrar producto</a></li>
                    <li><a href="index.php?ruta=Conproducto">Modificar producto</a></li>
                    <li><a href="index.php?ruta=Conproducto">Consultar producto</a></li>
                    <li><a href="index.php?ruta=Conproducto">Eliminar producto</a></li>
                </ul>
            </li>
            <li><a href="">Proveedores</a>
                <ul>
                    <li><a href="index.php?ruta=proveedor">Registrar proveedor</a></li>
                    <li><a href="index.php?ruta=Conproveedor">Modificar proveedor</a></li>
                    <li><a href="index.php?ruta=Conproveedor">Consultar proveedor</a></li>
                    <li><a href="index.php?ruta=Conproveedor">Eliminar proveedor</a></li>
                </ul>
            </li>
            <li><a href="">Usuarios</a>
                <ul>
                    <li><a href="index.php?ruta=usuario">Registrar Usuario</a></li>
                    <li><a href="index.php?ruta=Modusuario">Modificar Usuario</a></li>
                    <li><a href="index.php?ruta=Conusuario">Consultar Usuario</a></li>
                    <li><a href="index.php?ruta=Conusuario">Eliminar Usuario</a></li>
                </ul>
            </li>
            <li><a href="">Movimientos</a>
                <ul>
                    <li><a href="index.php?ruta=Entrada">Entrada</a></li>
                    <li><a href="index.php?ruta=Prueba">Salida</a></li>
                    <li><a href="">Traslado</a></li>
                    <li><a href="">Devolucion</a></li>
                    <li><a href="">Consultar Movimiento</a>
                        <ul>
                            <li><a href="">Consultar entrada</a></li>
                            <li><a href="">Consultar salida</a></li>
                            <li><a href="">Consultar traslado</a></li>
                            <li><a href="">Consultar devolucion </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href=""><?php
                echo $_SESSION['Nombre'];
               
            ?></a>
                <ul>
                    <li><a href="">Mis datos</a></li>
                    <li><a href="view/modules/cerrar.php">Cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
    </header>

