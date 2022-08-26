<link rel="stylesheet" href="view/css/consultaS.css">
<script src="view/js/Devolucion.js"></script>

<div class = "container">
    <h2 class = "H2S">CONSULTAR DEVOLUCION</h2>
<table>

    <thead>
        <td>CODIGO DE DEVOLUCION</td>
        <td>FECHA DE DEVOLUCION</td>
        <td>CANTIDAD TOTAL</td>
        <td>MOTIDVO DE DEVOLUCION</td>
        <td>CODIGO DEL EMPLEADO</td>
        <td>CODIGO DE PROVEEDOR</td>
        <td>DETALLE </td>
    </thead>
    <tbody>
        <?php
        $ControllerDevolucion = new ControllerDevolucion();//Cremos un objeto para llamar el controlador
        $listarDevolucion = $ControllerDevolucion -> ConsultarDevolucion();//El controlador llama el metodo de consulta

        foreach($listarDevolucion as $dato){//creamos un foreach para la impresion del array?>

            <tr>
                <td><?php   echo $dato["COD_DEVOLUCION"]//Imprimimos los datos  ?></td>
                <td><?php   echo $dato["FECHA"]   ?></td>
                <td><?php   echo $dato["CANTIDAD_TOTAL"]?></td>
                <td><?php   echo $dato["MOTIVO_DEVOLUCION"]?></td>
                <td><?php   echo $dato["COD_EMPLEADO"]  ?></td>
                <td><?php   echo $dato["COD_PROVEEDOR"]  ?></td>
                <td><a href="javascript:abrir()"  onclick = "ModificarD(this.parentElement.parentElement)">
                <input type="submit" value="Consultar detalle" name = "id"  >
                </a><input type="submit" value="Eliminar" onclick = "EliminarD(this.parentElement.parentElement)">
                <input type="submit" value = "Reporte" onclick = "ReporteD(this.parentElement.parentElement)">
                </td>

            </tr>

        <?php
        }
        if(isset($_GET['elimina'])){
            $objControllerDevolucion = new ControllerDevolucion();
            $objControllerDevolucion->EliminarDevolucion();
        }
        ?>

         
        
            </tbody>


        </table>
        </div>  
        <input type="submit" value = "Reporte general" onclick = "ReporteGD(this.parentElement.parentElement)">  
        <div id = "ContenedorDetalle" class = "ContenedorDetalle">
           
           <form action="" method="POST" class = "formConsultaD" id = "formConsultaD">
   
               <input type="hidden" id = "codDev" name = "codDev">
               
           </form>
               <?php
                  if(isset($_POST['codDev'])){
                       $codigoBD = $_POST['codDev'];
                       $_SESSION['numD'] = $codigoBD;  
                      
                   }
                
                 
               ?>
   
               <table>
               <thead>
                   <tr>
                       <td>CODIGO DETALLE DEVOLUCION</td>
                       <td>CODIGO DEL PRODUCTO</td>
                       <td>CANTIDAD</td>
                       <td>OPCIONES
                           <a href="javascript:ocultar()"><img src="view/img/cancelar.png" class = "cerrarCS"></a>
                       </td>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   if(empty($_SESSION['numD'])){
                       ?>
                         <span>SELECCIONE UN DETALLE</span>
                       <?php
     
                     }
                     else{
                   $ControllerDTDevolucion = new ControllerDevolucion();
                   $listarDTDevolucion = $ControllerDTDevolucion -> ConsultarDTDevolucion();
   
                   foreach($listarDTDevolucion as $dato){?>
                   <tr>
                   <td><?php echo $dato['COD_DTDEVOLUCION']?></td>
                   <td><?php echo $dato['COD_PRODUCTO']?></td>
                   <td><?php echo $dato['CANTIDAD_UNIDAD']?></td>
                   <td><input type="submit" value = "Modificar" onclick = "ModificarDT(this.parentElement.parentElement)"><input type="submit" value = "Eliminar">
                    
                    </td>
                   </tr>
              <?php
                   }}
              ?>
           </tbody>
       </table>
        <div class = "ContModDev">
            <form action="" method = "post" name = "formModDev">
                <input type="hidden"  id = "DTdevolucion" name = "DTdevolucion">

                <h4>
                    Codigo del producto
                    <input type="number"  id = "codProd" name = "codProd">
                </h4>

                <h4>
                    Cantidad
                    <input type="number"  id = "cantidad" name = "cantidad">
                </h4>
                  
                <input type="submit" value="Guardar">
            </form>
        </div>
       <?php
            if(isset($_POST["cantidad"])){//Si rececpiona nombre
                $DTdev = $_REQUEST['DTdevolucion'];
                $Cantidad = $_REQUEST['cantidad'];
                $codPro = $_REQUEST['codProd'];
                $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
                $stmt = $bd->prepare("UPDATE `detalle_devolucion` SET `COD_DTDEVOLUCION`= '$DTdev',`CANTIDAD_UNIDAD`= '$Cantidad',`COD_PRODUCTO`= $codPro WHERE `COD_DTDEVOLUCION` = $DTdev");//Modificamos la cantidad de la salida
                $stmt -> execute();   
                echo "<script>
                window.location = 'index.php?ruta=ConsultaD'
                </script>";
            }
        ?>
        </div>  