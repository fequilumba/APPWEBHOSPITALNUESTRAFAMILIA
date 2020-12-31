<?php
 require "../config/Conexion.php";
 class Especialidad{
     public function __construct(){
        
     }
     public function listarEspecialidad(){
        $sql= "SELECT * FROM `especialidad`";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar especialdiad
     public function insertar($nombre){
        $sql= "INSERT INTO `especialidad` (`nombre`, `estado`) 
        VALUES ('$nombre','1')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar especialidad
     public function editar($idespecialidad,$nombre){
        $sql= " UPDATE `especialidad` SET `nombre` = '$nombre' WHERE `especialidad`.`idespecialidad` = '$idespecialidad'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de una especialdiad por id
    public function mostrar($idespecialidad)
        {
            $sql= "SELECT * FROM `especialidad` WHERE `idespecialidad`='$idespecialidad'";
            return ejecutarConsultaSimpleFila($sql);
        }
    //METODOS PARA ACTIVAR/DESACTIVAR ESPECIALIDAD
    public function desactivar($idespecialidad)
    {
        $sql= "UPDATE `especialidad` SET `estado`='0' 
               WHERE `idespecialidad`='$idespecialidad'";
        
        return ejecutarConsulta($sql);
    }

    public function activar($idespecialidad)
    {
        $sql= "UPDATE `especialidad` SET `estado`='1' 
               WHERE `idespecialidad`='$idespecialidad'";
        
        return ejecutarConsulta($sql);
    }


 }
?>