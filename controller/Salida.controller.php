<?php

    class ControllerSalida{
      
        


        public function ConsultarSalida(){
            $array = false;

            try{
                $objDtoSalida = new Salida(null, null, null, null);
                $objDaoSalida = new ModelSalida($objDtoSalida);
                $array = $objDaoSalida ->  mdlConsultarSalida() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR EN EL TRY CATCH";
            }
            return $array;
        }

        public function EliminarSalida(){
            $objDtoSalida = new Salida(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,

        );
       
        $objDaoSalida = new ModelSalida($objDtoSalida);
        $objDaoSalida -> mdlEliminarDTSalida();
        $objDaoSalida -> mdlEliminarSalida();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaS'
        </script>";
    

 
}

  


    public function ConsultarDTSalida(){
        $array = false;

        try{
            $objDtoDTSalida = new DTSalida(null, null, null, null);
            $objDaoDTSalida = new ModelDTSalida($objDtoDTSalida);
            $array = $objDaoDTSalida ->  mdlConsultarDTSalida() -> fetchAll();
        }
        catch(Exception $e){
            echo "ERROR EN EL TRY CATCH";
        }
        return $array;
    }

    public function EliminarDTSalida(){
        $objDtoDTSalida = new DTSalida(
        $_GET['eliminaDT'],
        NULL,
        NULL,
        NULL
        );

    $objDaoDTTraslado = new ModelDTSalida($objDtoDTSalida);
    $objDaoDTTraslado -> mdlEliminarDTSalida();
    echo "<script>
        window.location = 'index.php?ruta=ConsultaS'
    </script>";
}


    }

?>