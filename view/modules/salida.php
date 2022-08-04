 
<link rel="stylesheet" href="view/css/salida.css">
<script src="view/js/crudSal.js"></script>
<form action="" method="post">

    <div class = "container">
       <h2>SALIDA</h2>
        <h3>
        </h3>
        
      
      
        <input type="submit" name = "guardaS" value = "Insertar Salida">
         
    </div>
   
    </form>
    <?php
    
    if(isset($_POST['guardaS'])){
        $codU = $_SESSION['datos']['COD_EMPLEADO'];
        $bd = new PDO('mysql:host=localhost; dbname=GINVZ','root', '');
        $stmt = $bd->prepare("INSERT INTO SALIDA (COD_EMPLEADO) VALUES('$codU')");
        $stmt -> execute();
        $id = $bd->lastInsertId();
        echo $id;
    }

?>   

   

  
</body>
</html>


</body>
</html>