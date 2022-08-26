<?php


    class ControllerDevolucion{
        public function ConsultarDevolucion(){
            $array = false;

            try{
                $objDtoDevolucion = new Devolucion(null, null, null, null, null, null);
                $objDaoDevolucion = new ModelDevolucion($objDtoDevolucion);
                $array = $objDaoDevolucion ->  mdlConsultarDevolucion() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR EN EL TRY CATCH";
            }
            return $array;
        }

        public function EliminarDevolucion(){
            $objDtoDevolucion = new Devolucion(
            $_GET['elimina'],
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
        );
       
        $objDaoDevolucion = new ModelDevolucion($objDtoDevolucion);
        $objDaoDevolucion -> mdlEliminarDTDevolucion();
        $objDaoDevolucion -> mdlEliminarDevolucion();
        //$objDaoEntrada -> mdlEliminarSalida();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaD'
        </script>";
    }

    
    public function ConsultarDTDevolucion(){
        $array = false;

        try{
            $objDtoDTDevolucion = new DTDevolucion(null, null, null, null);
            $objDaoDTDevolucion = new ModelDTDevolucion($objDtoDTDevolucion);
            $array = $objDaoDTDevolucion ->  mdlConsultarDTDevolucion() -> fetchAll();
        }
        catch(Exception $e){
            echo "ERROR EN EL TRY CATCH";
        }
        return $array;
    }

   
    }


?>