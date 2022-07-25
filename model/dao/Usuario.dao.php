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
    
    public function __construct($objDtoEmpleado){
        $this->codEmpleado = $objDtoEmpleado -> getCodEmpleado();
        $this->Nombre =$objDtoEmpleado -> getNombre();
        $this->Rol = $objDtoEmpleado -> getRol();
        $this->Contra = $objDtoEmpleado -> getContra();
        $this->Confirmacion = $objDtoEmpleado -> getConfirmacion();
        $this->Apellido = $objDtoEmpleado -> getApellido();
        $this->Telefono = $objDtoEmpleado -> getTelefono();
        $this->Cedula = $objDtoEmpleado -> getCedula();
        $this->Correo = $objDtoEmpleado -> getCorreo();
        
        
    }

    public function mdlInsertEmpleado(){
        $sql = "CALL spInsertarEmpleado(?,?,?,?,?,?,?,?)";
        $this->Estado = False;

        try{
            $con = new Conexion();
            $stmt = $con -> conexion() -> prepare($sql);
            $stmt -> bindParam(1, $this->Cedula, PDO::PARAM_INT);
            $stmt -> bindParam(2, $this->Nombre, PDO::PARAM_STR);
            $stmt -> bindParam(3, $this->Apellido, PDO::PARAM_STR);
            $stmt -> bindParam(4, $this->Telefono, PDO::PARAM_INT);
            $stmt -> bindParam(5, $this->Correo, PDO::PARAM_STR);
            $stmt -> bindParam(6, $this->Contra, PDO::PARAM_STR);
            $stmt -> bindParam(7, $this->Confirmacion, PDO::PARAM_STR);
            $stmt -> bindParam(8, $this->Rol, PDO::PARAM_INT);
            $stmt -> execute();
            $this->Estado = false;
            
        } 
        catch(PDOException $e){
            echo "ERROR AL INGRESAR EL PRODUCTO" . getMessage()->$e;
        }
    
    }
    
        public function mdlConsultarEmpleado(){
            $sql = "CALL splConsultaEmpleado()";
            $resultset = false;
            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> execute();
                $resultset = $stmt;
                
            }
            catch(Exception $e){
                echo "Error al listar empleados";
            }
            return $resultset;
        }

         
        public function mdlEliminarEmpleado(){
            $sql = "CALL splEliminarEmpleado(?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codEmpleado, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL ELIMINAR EL PRODUCTO" . getMessage()->$e;
        }
        return $this-> Estado;
        }

        public function mdlModificarUsuario(){
            $sql = "CALL splModificarEmpleado(?,?,?,?,?,?,?,?,?)";
            $this->Estado = False;

            try{
                $con = new Conexion();
                $stmt = $con -> conexion() -> prepare($sql);
                $stmt -> bindParam(1, $this->codEmpleado, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this->Cedula, PDO::PARAM_INT);
                $stmt -> bindParam(3, $this->Nombre, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this->Apellido, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this->Telefono, PDO::PARAM_INT);
                $stmt -> bindParam(6, $this->Correo, PDO::PARAM_STR);
                $stmt -> bindParam(7, $this->Contra, PDO::PARAM_STR);
                $stmt -> bindParam(8, $this->Confirmacion, PDO::PARAM_STR);
                $stmt -> bindParam(9, $this->Rol, PDO::PARAM_INT);
                $stmt -> execute();
                $this->Estado = true;
        } 
        catch(PDOException $e){
            echo "ERROR AL MODIFICAR EL PRODUCTO" . getMessage()->$e;
        }
        return $this-> Estado;
        }
       
}
            




  

?>
