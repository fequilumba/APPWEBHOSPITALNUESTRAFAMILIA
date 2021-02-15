<?php
 require "../config/Conexion.php";
 class Medicamento{
     public function __construct(){
        
     }
     /*CRUD examen tipo imagen*/
     public function listar(){
        $sql= "SELECT * FROM `medicamento`";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar tipo examen
     public function insertar($nombre,$descripcion){
        $sql= "INSERT INTO `medicamento` (`nombre`, `descripcion`, `estado`) 
        VALUES ('$nombre','$descripcion','1')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar tipo examen
     public function editar($idmedicamento, $nombre,$descripcion){
        $sql= " UPDATE `medicamento` m 
                SET m.`nombre` = '$nombre',m.`descripcion` = '$descripcion' 
                WHERE m.`idmedicamento` = '$idmedicamento'";
        return ejecutarConsulta($sql);
    }
    //mostrar datos de un tipo examen por id
    public function mostrar($idmedicamento)
    {
        $sql= "SELECT * FROM `medicamento` WHERE `idmedicamento`='$idmedicamento'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //METODOS PARA ACTIVAR/DESACTIVAR TIPO DE EXAMEN
    public function desactivar($idmedicamento)
    {
        $sql= "UPDATE `medicamento` SET `estado`='0' 
               WHERE `idmedicamento`='$idmedicamento'";
        
        return ejecutarConsulta($sql);
    }

    public function activar($idmedicamento)
    {
        $sql= "UPDATE `medicamento` SET `estado`='1' 
               WHERE `idmedicamento`='$idmedicamento'";
        
        return ejecutarConsulta($sql);
    }
    
    /*public function eliminarExamenImagen($idtipo_examen)
    {
        $sql= "DELETE FROM `tipo_examen` WHERE `tipo_examen`.`idtipo_examen` = '$idtipo_examen'";
        return ejecutarConsulta($sql);
    }*/

 }
?>