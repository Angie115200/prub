<link rel="stylesheet" href="view/css/consultaS.css">
<script src="view/js/Traslado.js"></script>

<div class = "container">
    <h2 class = "H2S">CONSULTAR TRASLADO</h2>
<table>

    <thead>
        <td>CODIGO DE TRASLADO</td>
        <td>FECHA DE TRASLADO</td>
        <td>CANTIDAD TOTAL</td>
        <td>CODIGO DEL EMPLEADO</td>
        <td>CODIGO DE BODEGA</td>
        <td>DETALLE </td>
    </thead>
    <tbody>
        <?php
        $ControllerTraslado = new ControllerTraslado();
        $listarTraslado = $ControllerTraslado -> ConsultarTraslado();

        foreach($listarTraslado as $dato){?>

            <tr>
                <td><?php   echo $dato["COD_TRASLADO"]  ?></td>
                <td><?php   echo $dato["FECHA_TRASLADO"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><?php   echo $dato['COD_BODEGA']?></td>
                <td><a href="javascript:abrir()"  onclick = "ModificarT(this.parentElement.parentElement)"><input type="submit" value="Consultar detalle" name = "id"  ></a><input type="submit" value="Eliminar" onclick = "EliminarT(this.parentElement.parentElement)"></td>

            </tr>

        <?php
        }
        if(isset($_GET['elimina'])){
            $objControllerTraslado = new ControllerTraslado();
            $objControllerTraslado->EliminarTraslado();
        }

        ?>
        
        
    </tbody>


</table>