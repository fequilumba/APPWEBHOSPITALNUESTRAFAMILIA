<?php
 require "../config/Conexion.php";
 class Calendario{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($especialidad_idespecialidad,$persona_idpersona, 
     $fecha_cita, $hora_cita, $diagnostico, $sintomas, 
     $motivo_consulta,$estado_idestado){
        $sql= "INSERT INTO `cita_medica` (`especialidad_idespecialidad`,`persona_idpersona`, `fecha_cita`, `hora_cita`, `diagnostico`, 
        `sintomas`, `motivo_consulta`, `estado_idestado`) 
        VALUES ('$especialidad_idespecialidad','$persona_idpersona', '$fecha_cita', '$hora_cita', '$diagnostico', '$sintomas', 
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
$sql= "SELECT r.idreceta, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
FROM `receta` r
INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=r.`cita_medica_idcita_medica`
INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
AND p.`idasociado`=5
ORDER BY r.`idreceta` DESC"
;

        $sql=ejecutarConsulta($sql);
        $resultado=$sql->fetch_object();
        echo json_encode($resultado);
?>