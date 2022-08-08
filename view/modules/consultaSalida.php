<script src="Salida.js"></script>
<div class = "container">
    <h2>CONSULTAR SALIDA</h2>
<table>

    <thead>
        <td>CODIGO DE SALIDA</td>
        <td>FECHA DE SALIDA</td>
        <td>CANTIDAD TOTAL</td>
        <td>CODIGO DEL EMPLEADO</td>
        <td>DETALLE</td>
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
                <td><input type="submit" value="Consultar detalle" name = "id" id = "id" onclick = "ModificarS(this.parentElement.parentElement)"></td>
            </tr>

        <?php
        }


        ?>
    </tbody>


</table>
</div>  
<div>
    <table>
        <thead>
            <tr>
                <td>CODIGO DE DETALLE SALIDA</td>
                <td>CANTIDAD</td>
                <td>CODIGO DEL PRODUCTO</td>
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

<h3>noooo</h3> 
<div>
<form action="" method="post">
        <h3>
            codigo de salida 
            <input type="number" name = "codSalida" id = "codSalida">
        </h3>
    </form>
</div>
   

</body>
</html>