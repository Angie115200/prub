<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GINVZ</title>
    <link rel="stylesheet" href="view/css/login.css">
    
</head>
<body>
    <div class = "Container">

    
    <div class = "FondoImg">
        <h1>GINVZ</h1>
    </div>
    <div class = "FondoP2">
        <div class = "Form">
        <form action="" method="POST">
                <h3>LOGIN</h3>
                <img src="../img/icon.png" alt="">
                <select name="Rol" id="">
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                </select>
                <input type="text" placeholder = "Usuario" name = "Usuario">
                <input type="password" placeholder = "Contraseña" name = "Contraseña">
                <input type="submit" value = "INGRESAR" class = "Ingreso">
            </div>
        </div>
    </form>
    </div>
    </div>
    <?php
                if (isset($_POST["Usuario"])){
                    $Cedula = $_POST["Usuario"];
                    $Contra = $_POST["Contraseña"];
                    $Rol = $_POST["Rol"];
                    $objController = new ConexionController();
                    $objController -> ctrLogin($Cedula, $Contra, $Rol);
                    
                }
            ?>

</body>
</html>