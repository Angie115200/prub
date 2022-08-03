<table>

    <thead>
        <td>CODIGO DE SALIDA</td>
        <td>FECHA DE SALIDA</td>
        <td>CANTIDAD TOTAL</td>
        <td>CODIGO DEL EMPLEADO</td>
    </thead>
    <tbody>
        <?php
        $ControllerSalida = new ControllerSalida();
        $listarEntrada = $ControllerSalida -> ConsultarSalida();

        foreach($listarEntrada as $dato){?>

            <tr>
                <td><?php   echo $dato["COD_SALIDA"]  ?></td>
                <td><?php   echo $dato["FECHA"]   ?></td>
                <td><?php   //echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   //echo $dato["COD_EMPLEADO"]  ?></td>
            </tr>

        <?php
        }


        ?>
    </tbody>


</table>
    
</body>
</html>