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
           
        <form action="" method="post" class = "formConsultaD" id = "formConsultaD">

        <input type="number" id = "codSalida" name = "codSalida">
      

            </form>
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