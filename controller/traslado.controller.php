<?php


    class ControllerTraslado{

        public function ConsultarTraslado(){
            $array = false;

            try{
                $objDtoTraslado = new Traslado(null, null, null, null, null);
                $objDaoTraslado = new ModelTraslado($objDtoTraslado);
                $array = $objDaoTraslado ->  mdlConsultarTraslado() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR EN EL TRY CATCH";
            }
            return $array;
        }

        public function EliminarTraslado(){
            $objDtoTraslado = new Traslado(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,
            NULL
        );
       
        $objDaoTraslado = new ModelTraslado($objDtoTraslado);
        //$objDaoSalida -> mdlEliminarDTSalida();
        $objDaoTraslado -> mdlEliminarTraslado();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaT'
        </script>";
    }


    }


    


?>