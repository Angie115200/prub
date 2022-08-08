<?php


    class ModelRegistroEmp
    {    

    private $codEmpleado;//Definimos las variables
    private $Nombre;
    private $Rol;
    private $Contra;
    private $Apellido;
    private $Telefono;
    private $Confirmacion;
    private $Cedula;
    private $Correo;
    private $Img;
    private $Estado;
    public $array;
    
    public function __construct($objDtoEmpleado){//utilizamos un metodo de arranque
        $this->codEmpleado = $objDtoEmpleado -> getCodEmpleado();
        $this->Nombre =$objDtoEmpleado -> getNombre();
        $this->Rol = $objDtoEmpleado -> getRol();
        $this->Contra = $objDtoEmpleado -> getContra();
        $this->Apellido = $objDtoEmpleado -> getApellido();
        $this->Telefono = $objDtoEmpleado -> getTelefono();
        $this->Cedula = $objDtoEmpleado -> getCedula();
        $this->Correo = $objDtoEmpleado -> getCorreo();
        
        
    }

    public function mdlInsertEmpleado(){//Creamos la funcion para insertar
        $sql = "CALL spInsertarEmpleado(?,?,?,?,?,?,?)";//Llamamos el procedimiento almacenado
        
        $this->Estado = False;

        try{//Si no hay errores ejecute
            $con = new Conexion();//Llame la conexion
            $stmt = $con -> conexion() -> prepare($sql);//prepare sql
            $stmt -> bindParam(1, $this->Cedula, PDO::PARAM_INT);//Envie  el parametro insertado
            $stmt -> bindParam(2, $this->Nombre, PDO::PARAM_STR);
            $stmt -> bindParam(3, $this->Apellido, PDO::PARAM_STR);
            $stmt -> bindParam(4, $this->Telefono, PDO::PARAM_INT);
            $stmt -> bindParam(5, $this->Correo, PDO::PARAM_STR);
            $stmt -> bindParam(6, $this->Contra, PDO::PARAM_STR);
            $stmt -> bindParam(7, $this->Rol, PDO::PARAM_INT);
            $stmt -> execute();//Ejecute la insercion
            $this->Estado = false;
           
        } 
        catch(PDOException $e){//Si hay un error envie un echo con e l error
            echo "ERROR AL INGRESAR EL PRODUCTO" . getMessage()->$e;
        }
    
    }
    
        public function mdlConsultarEmpleado(){//Cree la funcion de consulta
            $sql = "CALL splConsultaEmpleado()";//llame el procedimiento almacenado
            $resultset = false;
            try{//Si no hay error
                $con = new Conexion();//llame la conexion
                $stmt = $con -> conexion() -> prepare($sql);//prepare sql
                $stmt -> execute();//ejecute la consulta
                $resultset = $stmt;
                
            }
            catch(Exception $e){//Si hay un error
                echo "Error al listar empleados";//imprima
            }
            return $resultset;
        }


         
        public function mdlEliminarEmpleado(){//cree la funcion
            $sql = "CALL splEliminarEmpleado(?)";//llame el procedimiento almacenado
            $this->Estado = False;//asignele a estado un valor de false

            try{//Si no hay error
                $con = new Conexion();//Llame la conexion
                $stmt = $con -> conexion() -> prepare($sql);//prepare el sql
                $stmt -> bindParam(1, $this->codEmpleado, PDO::PARAM_INT);
                $stmt -> execute();//Ejecute la eliminacion
                $this->Estado = true;//asignele el valor de true a estado
        } 
        catch(PDOException $e){//Si hay un error imprima
            echo "ERROR AL ELIMINAR EL PRODUCTO" . getMessage()->$e;
        }
        return $this-> Estado;
        }

        public function mdlModificarUsuario(){//cree la funcion
            $sql = "CALL splModificarEmpleado(?,?,?,?,?,?,?)";//llame el procedimiento almacenado
            $this->Estado = False;//Asignele al estado el valor de false

            try{//si no hay error haga esto
                $con = new Conexion();//llame la conexion
                $stmt = $con -> conexion() -> prepare($sql);//prepare la modificacion
                $stmt -> bindParam(1, $this->codEmpleado, PDO::PARAM_INT);//envia los parametros a modificar
                $stmt -> bindParam(2, $this->Cedula, PDO::PARAM_INT);
                $stmt -> bindParam(3, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->Apellido, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->Telefono, PDO::PARAM_INT);
                $stmt -> bindParam(6, $this->Correo, PDO::PARAM_STR);
                $stmt -> bindParam(7, $this->Rol, PDO::PARAM_INT);
                $stmt -> execute();//ejecuta la modificacion
                $this->Estado = true;//Asigene al estado el valor de true
        } 
        catch(PDOException $e){//si hay un error imprima
            echo "ERROR AL MODIFICAR EL PRODUCTO" . getMessage()->$e;
        }
        return $this-> Estado;
        }
       
}
            




  

?>
