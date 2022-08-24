<?php

    class EntradaController{
      /*  public function InsertarEntrada($codEmpleado, $cantidadT, $precioTotal, $fecha, $hora){
            try{
                $objDtoEntrada = new Entrada(null, $codEmpleado, $cantidadT, $fecha, $hora, $precioTotal);
                $objDtoEntrada -> setCodE($codEmpleado);
                $objDtoEntrada -> setCantidadT($cantidadT);
                $objDtoEntrada -> setPrecioT($precioTotal);
                $objDtoEntrada -> setFecha($fecha);
                $objDtoEntrada -> setHora($hora);
                $objDtoEntrada -> setCodE($codEmpleado);

                $objDaoEntrada = new ModelEntrada($objDtoEntrada);
                if($objDaoEntrada -> mdlInsertarEntrada()){
                    echo "<script>alert('La entrada ha sido registrado exitosamente')</script>";
                }
                else{
                    echo "<script>alert('Ha ocurrido un error en el registro')</script>";
                }
            }
            catch(Exception $e){
                echo "ERROR";
            }
        }*/
        

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