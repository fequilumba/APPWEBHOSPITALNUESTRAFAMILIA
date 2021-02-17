<?php
 require "../config/Conexion.php";
 class Calendario{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($especialidad_idespecialidad,$persona_idpersona, 
     $fecha_cita, $hora_cita, $motivo_consulta,$estado_idestado){
        $sql= "INSERT INTO `cita_medica` (`especialidad_idespecialidad`,`persona_idpersona`, `fecha_cita`, `hora_cita`, `diagnostico`, 
        `sintomas`, `motivo_consulta`, `estado_idestado`) 
        VALUES ('$especialidad_idespecialidad','$persona_idpersona', '$fecha_cita', '$hora_cita', '', '', 
        '$motivo_consulta','$estado_idestado')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar registros
     public function editar($idcita_medica,$especialidad_idespecialidad,$persona_idpersona, 
     $fecha_cita, $hora_cita, $diagnostico, $sintomas, 
     $motivo_consulta,$estado_idestado){
        $sql= "UPDATE `cita_medica` SET `especialidad_idespecialidad`='$especialidad_idespecialidad',`persona_idpersona`='$persona_idpersona', `fecha_cita`='$fecha_cita', 
        `hora_cita`='$hora_cita', `diagnostico`='$diagnostico', 
        `sintomas`='$sintomas', `motivo_consulta`='$motivo_consulta', `estado_idestado`='$estado_idestado' WHERE `idcita_medica`='$idcita_medica'";
        return ejecutarConsulta($sql);
    }
    //mostrar un registro para editar
    public function mostrar($idcita_medica)
        {
            $sql= "SELECT * FROM `cita_medica` WHERE `idcita_medica`='$idcita_medica'";
    
            return ejecutarConsultaSimpleFila($sql);
        }
    public function eliminarCita($idcita_medica)
        {
            $sql= "DELETE FROM `cita_medica` WHERE `cita_medica`.`idcita_medica` = '$idcita_medica'";
    
            return ejecutarConsulta($sql);
        }
    //listar citas
    public function listar(){
        $sql= "SELECT cm.idcita_medica, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombre, p.`telefono`, cm.`fecha_cita`, cm.`hora_cita`, s.`nombre` AS estado       
        FROM `cita_medica` cm 
        INNER JOIN `estado` s ON cm.`estado_idestado`= s.`idestado`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`persona_idpersona` ";

        return ejecutarConsulta($sql);
    }
    public function listarCitas(){
        $sql= "SELECT * FROM `cita_medica`";

        $sql=ejecutarConsulta($sql);
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }
    
    
}
$sql= "SELECT mr.`medicamento_idmedicamento`, m.`nombre`, m.`descripcion`, mr.`cantidad`, mr.`observaciones`
FROM `medicamento_has_receta` mr
INNER JOIN `receta` r ON r.`idreceta`= mr.`receta_idreceta` 
INNER JOIN `medicamento` m ON m.`idmedicamento`= mr.`medicamento_idmedicamento` 
WHERE r.`idreceta`=4"
;

        $sql=ejecutarConsultaSimpleFila($sql);
        //$resultado=$sql->fetch_object();
        echo json_encode($sql);
?>