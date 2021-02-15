<?php
 require "../config/Conexion.php";
 class Examen{
     public function __construct(){
        
     }
     /*CRUD examen tipo imagen*/
     public function listarExamenTipo(){
        $sql= "SELECT * FROM `tipo_examen`";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar tipo examen
     public function insertarExamenTipo($nombre,$descripcion){
        $sql= "INSERT INTO `tipo_examen` (`nombre`, `descripcion`, `estado`) 
        VALUES ('$nombre','$descripcion','1')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar tipo examen
     public function editarExamenTipo($idtipo_examen,$nombre,$descripcion){
        $sql= " UPDATE `tipo_examen` ex 
                SET ex.`nombre` = '$nombre',ex.`descripcion` = '$descripcion' 
                WHERE ex.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de un tipo examen por id
    public function mostrarExamenTipo($idtipo_examen)
    {
        $sql= "SELECT * FROM `tipo_examen` WHERE `idtipo_examen`='$idtipo_examen'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //METODOS PARA ACTIVAR/DESACTIVAR TIPO DE EXAMEN
    public function desactivarExamenTipo($idtipo_examen)
    {
        $sql= "UPDATE `tipo_examen` SET `estado`='0' 
               WHERE `idtipo_examen`='$idtipo_examen'";
        
        return ejecutarConsulta($sql);
    }

    public function activarExamenTipo($idtipo_examen)
    {
        $sql= "UPDATE `tipo_examen` SET `estado`='1' 
               WHERE `idtipo_examen`='$idtipo_examen'";
        
        return ejecutarConsulta($sql);
    }
    
    /*public function eliminarExamenImagen($idtipo_examen)
    {
        $sql= "DELETE FROM `tipo_examen` WHERE `tipo_examen`.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }*/



    /***********************
     * *                           * *
     * *CRUD examen                * *
     * *                           * *
     * ****************************/
    public function listarExamen(){
        $sql= "SELECT e.`idexamen`, e.`nombre`, te.`nombre` as tipo 
                FROM `examen` e
                INNER JOIN `tipo_examen` te 
                ON e.tipo_examen_idtipo_examen=te.idtipo_examen";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar especialdiad
     public function insertarExamen($nombree,$tipo_examen_idtipo_examen){
        $sql= "INSERT INTO `examen` (`nombre`, `tipo_examen_idtipo_examen`) 
        VALUES ('$nombree','$tipo_examen_idtipo_examen')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar especialidad
     public function editarExamen($idexamen,$nombree,$tipo_examen_idtipo_examen){
        $sql= " UPDATE `examen` e 
        SET e.`nombre` = '$nombree', e.`tipo_examen_idtipo_examen` = '$tipo_examen_idtipo_examen' 
        WHERE e.`idexamen` = '$idexamen'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de una especialdiad por id
    public function mostrarExamen($idexamen)
    {
        $sql= "SELECT * FROM `examen` WHERE `idexamen`='$idexamen'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function selectExamenTipo()
    {
        $sql= "SELECT te.`idtipo_examen`, te.`nombre` 
                FROM `tipo_examen` te 
                WHERE te.`estado`=1";
        return ejecutarConsulta($sql);
    }

    /*public function eliminarExamenSangre($idtipo_examen)
    {
        $sql= "DELETE FROM `tipo_examen` WHERE `tipo_examen`.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }*/
 }
?>