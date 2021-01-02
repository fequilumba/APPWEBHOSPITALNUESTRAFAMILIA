<?php
 require "../config/Conexion.php";
 class Horario{
     public function __construct(){
        
     }
     public function listarEspecialidad(){
        $sql= "SELECT * FROM `especialidad`";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar Horario
     public function insertarHorario($especialidad_idespecialidad,$hora_inicio,$hora_fin){
        $sql= "INSERT INTO `horario` (`especialidad_idespecialidad`, `hora_inicio`,`hora_fin`) 
        VALUES ('$especialidad_idespecialidad','$hora_inicio','$hora_fin')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar Horario
     public function editarHorario($idhorario,$especialidad_idespecialidad,$hora_inicio,$hora_fin){
        $sql= " UPDATE `horario` SET `especialidad_idespecialidad`=$especialidad_idespecialidad,`hora_inicio` = '$hora_inicio',`hora_fin` = '$hora_fin' WHERE `horario`.`idhorario` = '$idhorario'";
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
    //selecccionar una especialidad para un medico
    public function selectEspecialidad(){
        $sql= "SELECT * FROM `especialidad` 
                WHERE `especialidad`.`estado`=1";
        return ejecutarConsulta($sql);
     }

 }
?>