<?php
    session_start();
    if(isset($_POST['formConsultaD'])){
        $codigoRD = $_POST['codDev'];
        $_SESSION['numDev'] = $codigoRD;  
      }
    print_r($_SESSION['numDev']);
   
?>