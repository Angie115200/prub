<?php

$codigo = 0;
$nombre = "";
$referenica = "";

if(isset($_SESSION['productos'])){
    
    $productos = $_SESSION['productos'];
    //print_r($_SESSION['productos']);
}
  
else{
    $productos = array();
}
?>
<link rel="stylesheet" href="view/css/salida.css">
<script src="view/js/Salida.js"></script>
<form action="" method="post" id = "formulario">

    <div class = "container" id = "container" name = "container">
       <h2>SALIDA</h2>
        <h3>
        </h3>
        
      
      
      
       
    </div>
   
    </form>
    <?php
   
?>  

    <form action="" method = "POST">
        <table>
            <thead>
                <tr>
                    <td><label>CODIGO</label></td>
                    <td><label>CANTIDAD</label></td>
                </tr>
                <tr>
                    <td><input type="number" name = "codProducto"></td>
                    <td><input type="number" name = "Cantidad"></td>
                    <td><input type="submit" value="BuscarProducto" name = "operacion"></td>
                </tr>
                <tr>
                    <td>CODIGO</td>
                    <td>NOMBRE</td>
                    <td>CANTIDAD</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($productos as $a){ ?>
                    <tr>
                        <td><?php echo $a ->COD_PRODUCTO; ?></td>
                        <td><?php echo $a -> NOMBRE;?></td>
                        <td><?php echo $a ->REFERENCIA;?></td>
                    </tr> 
                    <?php }?>
                    <td><input type="submit"  name = "operacion" value = "GuardarS"></input></td>
                    <td><input type="submit" value = "Cancelar" name = "operacion"></td>
            </tbody>
         
        </table>
    </form>
   
            <?php
            if(isset($_POST['operacion'])){
                $operacion = $_REQUEST['operacion'];
                $objDaoSalida = new PruebaM();
                switch ($operacion){//en caso de q operacion tenga el valor buscar cliente
                    case 'BuscarProducto' : $objDaoSalida -> mdlInsertarSalida() -> BuscarProducto();//llame la funcion buscar cliente
                    break;
                    case 'Cancelar' : $objDaoSalida->Cancelar();//llame la funcion buscar cliente
                    break;
                    case 'GuardarS' : $objDaoSalida->GuardarS();//llame la funcion buscar cliente
                    break; 
                }
               
          }
            ?>
    </table>
</body>
</html>


</body>
</html>