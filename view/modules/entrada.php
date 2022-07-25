
<form action="" method="post">

    <div class = "container">
        <input type="hidden" name = "codEntrada" id = "codEntrada">
       
        <h3>
            Cantidad Total
            <input type="number" name = "CantTotal" id = "CantTotal" >
        </h3>
        <input type="hidden" name = "codEmpleado" id = "codEmpleado" value = "<?php echo $_SESSION['Nombre'] ?>">
        <h3>
            Fecha de Entrada
            <input type="date" name="fecha" id="fecha">
        </h3>
        <h3>
            Precio total
            <input type="number" name = "PrecioTotal" id = "PrecioTotal" >
        </h3>
    </div>
    <div class = "modal-entrada">
        <input type="hidden" name = "codDTEntrada">
            <div class = "submodal">
                <?php

                ?>
                <h3>
                    <input type="cantidad" name="" id="">
                </h3>
            </div>
      
    </div>
</form>


</body>
</html>