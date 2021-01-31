<?php
 require "../config/Conexion.php";
 class Examen{
     public function __construct(){
        
     }
     /*CRUD examen tipo imagen*/
     public function listarExamenImagen(){
        $sql= "SELECT ex.`idtipo_examen`,ex.`nombre` 
                FROM `tipo_examen` ex WHERE ex.`idasociado`=1 
                AND ex.`idtipo_examen`>2";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar especialdiad
     public function insertarExamenImagen($nombre){
        $sql= "INSERT INTO `tipo_examen` (`nombre`, `idasociado`) 
        VALUES ('$nombre','1')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar especialidad
     public function editarExamenImagen($idtipo_examen,$nombre){
        $sql= " UPDATE `tipo_examen` ex SET ex.`nombre` = '$nombre' 
        WHERE ex.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de una especialdiad por id
    public function mostrarExamenImagen($idtipo_examen)
    {
        $sql= "SELECT * FROM `tipo_examen` WHERE `idtipo_examen`='$idtipo_examen'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function eliminarExamenImagen($idtipo_examen)
    {
        $sql= "DELETE FROM `tipo_examen` WHERE `tipo_examen`.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }
    /***********************
     * *                           * *
     * *CRUD examen tipo sangre    * *
     * *                           * *
     * ****************************/
    public function listarExamenSangre(){
        $sql= "SELECT ex.`idtipo_examen`,ex.`nombre` 
                FROM `tipo_examen` ex WHERE ex.`idasociado`=2 
                AND ex.`idtipo_examen`>2";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar especialdiad
     public function insertarExamenSangre($nombre){
        $sql= "INSERT INTO `tipo_examen` (`nombre`, `idasociado`) 
        VALUES ('$nombre','2')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar especialidad
     public function editarExamenSangre($idtipo_examen,$nombre){
        $sql= " UPDATE `tipo_examen` ex SET ex.`nombre` = '$nombre' 
        WHERE ex.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de una especialdiad por id
    public function mostrarExamenSangre($idtipo_examen)
    {
        $sql= "SELECT * FROM `tipo_examen` WHERE `idtipo_examen`='$idtipo_examen'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    public function eliminarExamenSangre($idtipo_examen)
    {
        $sql= "DELETE FROM `tipo_examen` WHERE `tipo_examen`.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }
 }
?>