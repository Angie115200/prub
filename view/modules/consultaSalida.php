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
        $listarSalida = $ControllerSalida -> ConsultarSalida();

        foreach($listarSalida as $dato){?>

            <tr>
                <td><?php   echo $dato["COD_SALIDA"]  ?></td>
                <td><?php   echo $dato["FECHA"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><input type="submit" value="Consultar detalle" onclick = "ModificarS(this.parentElement.parentElement)" name = "id" id = "Submit1" ><input type="submit" value="Eliminar" onclick = "EliminarS(this.parentElement.parentElement)"></td>

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
<input type="submit" value = "Reporte general" onclick = "ReporteGS(this.parentElement.parentElement)">  

        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
        <form action="" method="POST" class = "formConsultaD" id = "formConsultaD">

            <input type="hidden" id = "codSalida" name = "codSalida">
        </form>
            <?php
               if(isset($_POST['codSalida'])){
                    $codigoBS = $_POST['codSalida'];
                    $_SESSION['num'] = $codigoBS;  
                }
                //echo $_SESSION['num'];
              
            ?>

            <table>
            <thead>
                <tr>
                    <td>CODIGO DE DETALLE SALIDA</td>
                    <td>CANTIDAD</td>
                    <td>CODIGO DEL PRODUCTO
                      
                    </td>
                    <td>OPCIONES</td>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if(empty($_SESSION['num'])){
                  ?>
                    <span>SELECCIONE UN DETALLE</span>
                  <?php

                }
                else{
                    $ControllerDTSalida = new ControllerSalida();
                    $listarDTSalida = $ControllerDTSalida -> ConsultarDTSalida();
               
                    foreach($listarDTSalida as $dato){?>
                        <tr>
                            <td><?php echo $dato['COD_DTSALIDA']?></td>
                            <td><?php echo $dato['CANTIDAD']?></td>
                            <td><?php echo $dato['COD_PRODUCTO']?></td>
                            
                            <td><input type="submit" value = "Modificar" onclick = "ModificarDT(this.parentElement.parentElement)"><td>
                        </tr>
                <?php
                }}
            
                ?>
        </tbody>
      
    </table>
        </div>

</div>

        <div class = "ContModDev">
            <h2>MODIFICAR DETALLE DE SALIDA</h1>
            <form action="" method = "post" name = "formModDTSal">
                <input type="hidden"  id = "DTSalida" name = "DTSalida">

                <h4>
                    Codigo del producto
                    <input type="number"  id = "codProd" name = "codProd">
                </h4>
               

                <h4>
                    Cantidad
                    <input type="number"  id = "cantidad" name = "cantidad">
                </h4>


             
                  
                <input type="submit" value="Guardar" class = "Guardar">
            </form>
        </div>
        <?php
            if(isset($_POST["codProd"])){//Si rececpiona nombre
                $DTSal = $_REQUEST['DTSalida'];
                $Cantidad = $_REQUEST['cantidad'];
                $codPro = $_REQUEST['codProd'];
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("UPDATE `detalle_salida` SET `COD_DTSALIDA`='$DTSal',`COD_PRODUCTO`='$codPro',`CANTIDAD`='$Cantidad' WHERE `COD_DTSALIDA`='$DTSal'");//Modificamos la cantidad de la salida
                $stmt -> execute();   
                echo "<script>
                window.location = 'index.php?ruta=ConsultaS'
                </script>";
            }
?>

</body>
</html>