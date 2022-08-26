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
        <input type="submit" value = "Reporte" onclick = "ReporteGE(this.parentElement.parentElement)"> 
        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
        <form action="" method="POST" class = "formConsultaD" id = "formConsultaE">

            <input type="hidden" id = "codEntrada" name = "codEntrada">
            
        </form>
            <?php
               if(isset($_POST['codEntrada'])){
                    $codigoBE = $_POST['codEntrada'];
                    $_SESSION['numE'] = $codigoBE;  
                   
                }
                //echo $_SESSION['num'];
              
            ?>

            <table>
            <thead>
                <tr>
                    <td>CODIGO DETALLE ENTRADA</td>
                    <td>CODIGO DEL PRODUCTO</td>
                    <td>CANTIDAD</td>
                    <td>PRECIO UNITARIO</td>
                    <td>SUBTOTAL</td>
                    <td>OPCIONES</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if(empty($_SESSION['numE'])){
                    ?>
                      <span>SELECCIONE UN DETALLE</span>
                    <?php
  
                  }
                  else{
                $ControllerDTEntrada = new EntradaController();
                $listarDTEntrada = $ControllerDTEntrada -> ConsultarDTEntrada();

                foreach($listarDTEntrada as $dato){?>
                <tr>
                <td><?php echo $dato['COD_DTENTRADA']?></td>
                <td><?php echo $dato['COD_PRODUCTO']?></td>
                <td><?php echo $dato['CANTIDAD']?></td>
                <td><?php echo $dato['PRECIO_UNIDAD']?></td>
                <td><?php echo $dato['SUBTOTAL']?></td>
                <td><input type="submit" value = "Modificar" onclick = "ModificarDT(this.parentElement.parentElement)"><input type="submit" value = "Eliminar" onclick = "eliminarDTE()"></td>
                </tr>
           <?php
                }}
           ?>
        </tbody>
    </table>
        </div>
        <div class = "ContModDev">
            <form action="" method = "post" name = "formModDTEn">
                <input type="hidden"  id = "DTEntrada" name = "DTEntrada">

                <h4>
                    Codigo del producto
                    <input type="number"  id = "codProd" name = "codProd">
                </h4>
               

                <h4>
                    Cantidad
                    <input type="number"  id = "cantidad" name = "cantidad">
                </h4>


                <h4>
                    Precio unitario
                    <input type="number"  id = "precioU" name = "precioU">
                </h4>
                  
                <input type="submit" value="Guardar">
            </form>
        </div>
        <?php
            if(isset($_POST["codProd"])){//Si rececpiona nombre
                $DTEnt = $_REQUEST['DTEntrada'];
                $Cantidad = $_REQUEST['cantidad'];
                $codPro = $_REQUEST['codProd'];
                $precioU = $_REQUEST['precioU'];
                $subtotal = $precioU * $Cantidad;
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("UPDATE `detalle_entrada` SET `COD_DTENTRADA`='$DTEnt',`COD_PRODUCTO`='$codPro',`CANTIDAD`='$Cantidad',`PRECIO_UNIDAD`='$precioU',`SUBTOTAL`='$subtotal' WHERE `COD_DTENTRADA`='$DTEnt'");//Modificamos la cantidad de la salida
                $stmt -> execute();   
                echo "<script>
                window.location = 'index.php?ruta=ConsultaE'
                </script>";
            }

            
        ?>
</div>

        