<?

?>
<link rel="stylesheet" href="view/css/datos.css">
<div class = "container">
    <h2>MIS DATOS</h2>
    <div class = "contenerdorD">
    <P class = "dato1">MI ID</P><p class = "result1"><?php  echo($_SESSION['datos']['COD_EMPLEADO'])?>
    <p class = "dato">NOMBRE</p><p class = "result"><?php  echo($_SESSION['datos']['NOMBRE'])?>
    <p class = "dato">APELLIDO</p><p class = "result"><?php  echo($_SESSION['datos']['APELLIDO'])?>
    <p class = "dato">CEDULA</p><p class = "result"><?php  echo($_SESSION['datos']['CEDULA'])?>
    <p class = "dato">CORREO</p><p class = "result"><?php  echo($_SESSION['datos']['CORREO'])?>
    <p class = "dato">TELEFONO</p><p class = "result"><?php  echo($_SESSION['datos']['NUMERO_CONTACTO'])?>
    <p class = "dato">ROL</p><p class = "result"><?php if($_SESSION['datos']['COD_ROL'] == 1){
        echo "Administrador";}
        else{
        echo "Empleado";
        }?>
    </div>
   

    

                
             
    
         </div>

         
        
     </div>
     </div>
     </div>
    

</div>
    
</body>
</html>