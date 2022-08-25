<?php

    class EntradaController{
        public function EliminarEntrada(){
            $objDtoEntrada = new Entrada(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,
            NULL
        );
       
        $objDaoEntrada = new ModelEntrada($objDtoEntrada);
        $objDaoEntrada -> mdlEliminarEntrada();
        //$objDaoEntrada -> mdlEliminarSalida();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaE'
        </script>";
    }

        public function ConsultarEntrada(){
            $array = false;

            try{
                $objDtoEntrada = new Entrada(null, null, null, null, null);
                $objDaoEntrada = new ModelEntrada($objDtoEntrada);
                $array = $objDaoEntrada ->  mdlConsultarEntrada() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR EN EL TRY CATCH";
            }
            return $array;
        }

    }

?>