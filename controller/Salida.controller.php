<?php

    class ControllerSalida{
        public function InsertarSalida( $CantT, $codE){

            try{
                $objDtoSalida = new Salida(null,null, $CantT, $codE);  
                $objDtoSalida -> setCanT($CantT);
                $objDtoSalida -> setcodE($codE);

                $obDaoSalida = new ModelSalida($objDtoSalida);
                $obDaoSalida -> mdlInsertarSalida();
            }
            catch(Exception $e){
                echo "ERORR EN EL CATCH";
            }
        }
        public function InsertarDTSalida($CantidadUni, $CodProducto, $CodSalida){

            try{
                $objDtoDTSalida = new DTSalida(null,$CantidadUni, $CodProducto, $CodSalida);  
                $objDtoDTSalida -> setCantidadUni($CantidadUni);
                $objDtoDTSalida -> setCodProducto($CodProducto);
                $objDtoDTSalida -> setCodSalida($CodSalida);

                $objDaoDTSalida = new ModelDTSalida($objDtoDTSalida);
                var_dump($objDtoDTSalida);
                if($objDaoDTSalida -> MdlInsertarDTSalida()){
                    echo "BIEN";
                }
                else{
                    echo "ERROR";
                }
            }
            catch(Exception $e){
                echo "ERORR EN EL CATCH";
            }
        }

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

  

       /* public function ConsultarId(){
            $array = false;
        try{
            $objDtoSalida = new Salida(null, null, null, null);
            $objDaoSalida = new ModelSalida($objDtoSalida);
            $array = $objDaoSalida -> mdlConsultarId() -> fetchAll();
        }
        catch(Exception $e){
            echo "ERROR";
        }
        return $array;
        }
    */
    }

?>