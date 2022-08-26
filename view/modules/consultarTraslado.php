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

</div>  
<input type="submit" value = "Reporte general" onclick = "ReporteGT(this.parentElement.parentElement)" class = "ReporteG">  

        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
        <form action="" method="POST" class = "formConsultaT" id = "formConsultaT">

            <input type="hidden" id = "codTraslado" name = "codTraslado">
        </form>
            <?php
               if(isset($_POST['codTraslado'])){
                    $codigoBT = $_POST['codTraslado'];
                    $_SESSION['numT'] = $codigoBT;  
                }
                //echo $_SESSION['num'];
              
            ?>

            <table>
            <thead>
                <tr>
                    <td>CODIGO DE DETALLE TRASLADO</td>
                    <td>CANTIDAD</td>
                    <td>CODIGO DEL PRODUCTO</td>
                    <td>OPCIONES</td>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if(empty($_SESSION['numT'])){
                  ?>
                    <span>SELECCIONE UN DETALLE</span>
                  <?php

                }
                else{
                    $ControllerDTTraslado = new ControllerTraslado();
                    $listarDTTraslado = $ControllerDTTraslado -> ConsultarDTTraslado();
               
                    foreach($listarDTTraslado as $dato){?>
                        <tr>
                            <td><?php echo $dato['COD_DTTRASLADO']?></td>
                            <td><?php echo $dato['CANTIDAD_UNIDAD']?></td>
                            <td><?php echo $dato['COD_PRODUCTO']?></td>
                            
                            <td>
                            <a href="javascript:abrirMD()" onclick = "ModificarDT(this.parentElement.parentElement)">
                            <input type="submit" value = "Modificar"></a>    
                            <td>
                        </tr>
                <?php
                }}
            
                ?>
        </tbody>
      
    </table>
        </div>
        <div class = "ContModDev" id = "ContModDev">
            <h2>MODIFICAR DETALLE TRASLADO
                <a href="javascript:ocultarMD()"><img src="view/img/cancelar.png"></a>
            </h2>
            <form action="" method = "post" name = "formModTras">
                <input type="hidden"  id = "DTTraslado" name = "DTTraslado">

                <h4>
                    Codigo del producto
                    <input type="number"  id = "codProd" name = "codProd">
                </h4>

                <h4>
                    Cantidad
                   
                </h4>
                <input type="number"  id = "cantidad" name = "cantidad" class = "ca"> 
                  
                <input type="submit" value="Guardar" class = "Guardar">
            </form>
        </div>
       <?php
            if(isset($_POST["DTTraslado"])){//Si rececpiona nombre
                $DTTras = $_REQUEST['DTTraslado'];
                $Cantidad = $_REQUEST['cantidad'];
                $codPro = $_REQUEST['codProd'];
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("UPDATE `detalle_traslado` SET `COD_DTTraslado`= '$DTTras',`CANTIDAD_UNIDAD`= '$Cantidad',`COD_PRODUCTO`= $codPro WHERE `COD_DTTRASLADO` = $DTTras");//Modificamos la cantidad de la salida
                $stmt -> execute();   
                echo "<script>
                window.location = 'index.php?ruta=ConsultaT'
                </script>";
            }
        ?>
</div>
