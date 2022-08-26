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
        $objDaoEntrada -> mdlEliminarDTEntrada();
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

        public function ConsultarDTEntrada(){
            $array = false;
        
            try{
                $objDtoDTEntrada = new DTEntrada(null, null, null, null, null, null);
                $objDaoDTEntrada = new ModelDTEntrada($objDtoDTEntrada);
                $array = $objDaoDTEntrada ->  mdlConsultarDTEntrada() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR EN EL TRY CATCH";
            }
            return $array;
        }
        public function EliminarDTEntrada(){
            $objDtoDTEntrada = new DTEntrada(
            $_GET['eliminaDT'],
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
            );
    
        $objDaoDTEntrada = new ModelDTEntrada($objDtoDTEntrada);
        $objDaoDTEntrada -> mdlEliminarDTEntrada();
        echo "<script>
            window.location = 'index.php?ruta=ConsultaE'
        </script>";
    }

    }

?>