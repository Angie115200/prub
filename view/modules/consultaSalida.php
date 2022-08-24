<link rel="stylesheet" href="view/css/consultaS.css">
<script src="view/js/Salida.js"></script>

<div class = "container">
    <h2 class = "H2S">CONSULTAR SALIDA</h2>
<table>

    <thead>
        <td>CODIGO DE SALIDA</td>
        <td>FECHA DE SALIDA</td>
        <td>CANTIDAD TOTAL</td>
        <td>CODIGO DEL EMPLEADO</td>
        <td>DETALLE </td>
    </thead>
    <tbody>
        <?php
        $ControllerSalida = new ControllerSalida();
        $listarEntrada = $ControllerSalida -> ConsultarSalida();

        foreach($listarEntrada as $dato){?>

            <tr>
                <td><?php   echo $dato["COD_SALIDA"]  ?></td>
                <td><?php   echo $dato["FECHA"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><a href="javascript:abrir()"  onclick = "ModificarS(this.parentElement.parentElement)"><input type="submit" value="Consultar detalle" name = "id"  ></a><input type="submit" value="Eliminar" onclick = "EliminarS(this.parentElement.parentElement)"></td>

            </tr>

        <?php
        }
        if(isset($_GET['elimina'])){
            $objControllerSalida = new ControllerSalida();
            $objControllerSalida->EliminarSalida();
        }

        ?>
        
    </tbody>


</table>
</div>  

        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
        <form action="" method="POST" class = "formConsultaD" id = "formConsultaD">

            <input type="hidden" id = "codSalida" name = "codSalida">
            <input type="submit" name="Buscar" id="Buscar">
        </form>
            <?php
                if(isset($_POST['codSalida'])){
                    $codigoBS = $_POST['codSalida'];
                    $_SESSION['num'] = $codigoBS;
                    $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                    $consulta = $bd->query("SELECT * FROM detalle_salida WHERE COD_SALIDA = $codigoBS")->fetch(PDO::FETCH_OBJ);
                    $_SESSION['detallePRO'][] = $consulta;//Llamamos el array almacenado en session usando []
                    print_r($_SESSION['detallePRO']);
                }
                //echo $_SESSION['num'];
              
            ?>

            <table>
            <thead>
                <tr>
                    <td>CODIGO DE DETALLE SALIDA</td>
                    <td>CANTIDAD</td>
                    <td>CODIGO DEL PRODUCTO
                        <a href="javascript:ocultar()"><img src="view/img/cancelar.png" class = "cerrarCS"></a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?php ?></td>
                <td><?php ?></td>
                <td><?php ?></td>
                </tr>
           
        </tbody>
    </table>
        </div>

</div>
<?php



?>

</body>
</html>