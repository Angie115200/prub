<link rel="stylesheet" href="view/css/consultaS.css">
<script src="view/js/Salida.js"></script>

<div class = "container">
    <h2 class = "H2S">CONSULTAR ENTRADA</h2>
<table>

    <thead>
        <td>CODIGO DE ENTRADA</td>
        <td>FECHA DE SALIDA</td>
        <td>CANTIDAD TOTAL</td>
        <td>PRECIO TOTAL</td>
        <td>CODIGO DEL EMPLEADO</td>
        <td>DETALLE </td>
    </thead>
    <tbody>
        <?php
        $ControllerEntrada = new EntradaController();
        $listarEntrada = $ControllerEntrada -> ConsultarEntrada();

        foreach($listarEntrada as $dato){?>

            <tr>
                <td><?php   echo $dato["COD_ENTRADA"]  ?></td>
                <td><?php   echo $dato["FECHA_ENTRADA"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["PRECIO_TOTAL"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><a href="javascript:abrir()"  onclick = "ModificarE(this.parentElement.parentElement)"><input type="submit" value="Consultar detalle" name = "id"  ></a><input type="submit" value="Eliminar" onclick = "EliminarS(this.parentElement.parentElement)"></td>

            </tr>

        <?php
        }
        if(isset($_GET['elimina'])){
            $objControllerEntrada = new EntradaController();
            $objControllerSalida->EliminarEntrada();
        }

        ?>