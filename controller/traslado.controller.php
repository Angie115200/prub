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
        $objDaoTraslado -> mdlEliminarDTTraslado();
        $objDaoTraslado -> mdlEliminarTraslado();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaT'
        </script>";
    }

    public function ConsultarDTTraslado(){
        $array = false;
    
        try{
            $objDtoDTTraslado = new DTTraslado(null, null, null, null);
            $objDaoDTTraslado = new ModelDTTraslado($objDtoDTTraslado);
            $array = $objDaoDTTraslado ->  mdlConsultarDTTraslado() -> fetchAll();
          
        }
        catch(Exception $e){
            echo "ERROR EN EL TRY CATCH";
        }
        return $array;
    }

    
    public function EliminarDTTraslado(){
        $objDtoDTTraslado = new DTTraslado(
        $_GET['eliminaDT'],
        NULL,
        NULL,
        NULL
    );
   echo "si";
    $objDaoDTTraslado = new ModelDTTraslado($objDtoDTTraslado);
    //$objDaoSalida -> mdlEliminarDTSalida();
    $objDaoDTTraslado -> mdlEliminarDTTraslado();
    echo "<script>
        window.location = 'index.php?ruta=ConsultaT'
    </script>";
}

    }


    


?>