<?php
    class controllerDTSalida{
        public function ConsultarDetalleS($codSalida){
            $array = false;
            try{
                $objDtoDTSalida = new DTSalida(null, null,null, $codSalida);
                $objDaoDTSalida = new  ModelDTSalida ( $objDtoDTSalida );
                $array = $objDaoProducto -> mdlConsultarDetalleS() -> fetchAll();
            }
            catch(Exception $e){
                echo "ERROR";
            }
            return $array;
            
        }   
    }
   

?>