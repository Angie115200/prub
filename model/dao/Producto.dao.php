<?php

    class ModelProducto{//Creamos la clase que nos servira para llamar las funciones
        private $CodProducto;
        private $Nombre;
        private $Referencia;
        private $Disponibilidad;
        private $Estado;

        public function __construct($objDtoProducto){//Creamos el metodo de arranque
            $this->CodProducto = $objDtoProducto -> getCodProducto();//Por medio del objetoDtoProducto llamamos la funcion de retorno
            $this->Nombre = $objDtoProducto -> getNombre();
            $this->Referencia = $objDtoProducto -> getReferencia();
            $this->Disponibilidad = $objDtoProducto -> getDisponibilidad();
        }
        public function mdlInsertarProducto(){//Creamos la funcion de insercion
            $sql = "CALL splInsertarProducto( ?, ?, ? );";//Por medio de sql llamamos el procedimiento almacenado
            $this -> Estado = false;//Usamos la variable estado para saber si se ejecuta correctamene
            try {
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos la base de datos
                $stmt -> bindParam ( 1, $this->Nombre, PDO::PARAM_STR);//Almacenamos y enviamos los parametros en la insercion
                $stmt -> bindParam ( 2, $this->Referencia, PDO::PARAM_STR);
                $stmt -> bindParam ( 3, $this->Disponibilidad,  PDO::PARAM_INT);
                $stmt -> execute();//Ejecutamos la insercion
                $this -> Estado = true;//Si hizo lo anterior el estado se vuelve verdadero
            } catch (PDOException $ex) {//Creamos una excepcion en caso de error
                echo "Hay un error en el dao de producto " . $ex -> getMessage();
            }
            return $this -> Estado;
        }//FIN DE INSERTAR PRODUCTO

        public function mdlConsultarProducto(){//Creamos la funcion de consulta
            $sql = "CALL splConsultarProducto()";//por medio de sql llamamos el procedimiento almacenado
            $resultset = false;
            try{
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//Preparamos la base de datos
                $stmt -> execute();//Ejecutamos la consulta
                $resultset = $stmt;
                
            }
            catch(Exception $e){//Creamos una exception en caso de errores
                echo "Error al listar empleados";
            }
            return $resultset;
        }

        public function mdlEliminarProducto(){//Creamos la funcion para eliminar
            $sql = "CALL splEliminarProducto(?)";//llamamos el procedimiento almacenado 
            $this->Estado = False;

            try{
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos la base de datos
                $stmt -> bindParam(1, $this->CodProducto, PDO::PARAM_INT);
                $stmt -> execute();//Ejecutamos la eliminacion
                $this->Estado = true;
        } 
        catch(PDOException $e){//Creamos una excepcion en caso de errores
            echo "ERROR AL ELIMINAR EL PRODUCTO" . $e->getMessage();
        }
        return $this-> Estado;
        
        }
        

        public function mdlModificarProducto(){//Creamos una funcion para modificar el producto
            $sql = "CALL splModificarProducto(?,?,?,?)";//llamamos el procedimiento almacenado
            $this -> Estado = false;//asignamos un valor de false a la variable estado 
            try {
                $con = new Conexion();//llamamos la conexion
                $stmt = $con -> conexion() -> prepare($sql);//preparamos la base de datos
                $stmt -> bindParam ( 1, $this->CodProducto, PDO::PARAM_INT);//Enviamos los parametros 
                $stmt -> bindParam ( 2, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam ( 3, $this->Referencia, PDO::PARAM_STR);
                $stmt -> bindParam ( 4, $this->Disponibilidad,  PDO::PARAM_INT);
                $stmt -> execute();//Ejecutamos la modificacion
                $this -> Estado = true;//Si realizo correctamente los pasos anteriores estado se vuelve true
            } catch (PDOException $ex) {//Creamos una exception en caso de errores
                echo "Hay un error en el dao de producto " . $ex -> getMessage();
            }
            return $this -> Estado;
        }//FIN DE MODIFICAR PRODUCTO

    }





    
?>