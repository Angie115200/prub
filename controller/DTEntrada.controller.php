<?php


    class DTEntradaController{
        public function InsertarDetalleE($codEntrada, $codProducto,  $cantidadUni,$precioUni,$subtotal){
            try{
                $objDtoDTEntrada = new DTEntrada(null,$codEntrada, $codProducto,  $cantidadUni,$precioUni,$subtotal);
                $objDtoDTEntrada -> setCodEntrada($codEntrada);
                $objDtoDTEntrada -> setCodProducto($codProducto);
                $objDtoDTEntrada -> setCantidadUni($cantidadUni);
                $objDtoDTEntrada -> setPrecioUni($precioUni);
                $objDtoDTEntrada -> setSubtotal($subtotal);
               
                $objDaoDTEntrada = new ModelDTEntrada($objDtoDTEntrada);
                                            
               
                if($objDaoDTEntrada -> mdlInsertarDTEntrada()){
                    echo "<script>alert('La entrada ha sido registrado exitosamente')</script>";
                }
                else{
                    echo "<script>alert('Ha ocurrido un error en el registro')</script>";
                }
            }
            catch(Exception $e){
                echo "ERROR";
            }
        }
    }

?>