<link rel="stylesheet" href="view/css/consultaS.css">
<script src="view/js/Entrada.js"></script>

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
        $ControllerEntrada = new EntradaController();//Cremos un objeto para llamar el controlador
        $listarEntrada = $ControllerEntrada -> ConsultarEntrada();//El controlador llama el metodo de consulta

        foreach($listarEntrada as $dato){//creamos un foreach para la impresion del array?>

            <tr>
                <td><?php   echo $dato["COD_ENTRADA"]//Imprimimos los datos  ?></td>
                <td><?php   echo $dato["FECHA_ENTRADA"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["PRECIO_TOTAL"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><a href="javascript:abrir()"  onclick = "ModificarE(this.parentElement.parentElement)"><input type="submit" value="Consultar detalle" name = "id"  ></a><input type="submit" value="Eliminar" onclick = "EliminarE(this.parentElement.parentElement)"></td>

            </tr>

        <?php
        }
        if(isset($_GET['elimina'])){
            $objControllerEntrada = new EntradaController();
            $objControllerEntrada->EliminarEntrada();
        }
        ?>

         
        
            </tbody>


        </table>
        </div>  
        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
        <form action="" method="POST" class = "formConsultaD" id = "formConsultaD">

            <input type="hidden" id = "codSalida" name = "codSalida">
            <input type="submit" name="Buscar" id="Buscar" value = "MOSTRAR DETALLE">
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
                    <td>OPCIONES
                        <a href="javascript:ocultar()"><img src="view/img/cancelar.png" class = "cerrarCS"></a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                $ControllerDTSalida = new ControllerSalida();
                $listarDTSalida = $ControllerDTSalida -> ConsultarDTSalida();

                foreach($listarDTSalida as $dato){?>
                <tr>
                <td><?php echo $dato['COD_DTSALIDA']?></td>
                <td><?php echo $dato['CANTIDAD']?></td>
                <td><?php echo $dato['COD_PRODUCTO']?></td>
                <td><input type="submit" value = "Modificar"><input type="submit" value = "Eliminar"></td>
                </tr>
           <?php
                }
           ?>
        </tbody>
    </table>
        </div>

</div>

        