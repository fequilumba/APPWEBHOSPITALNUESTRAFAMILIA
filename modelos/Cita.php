<?php
 require "../config/Conexion.php";
 class Cita{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($especialidad_idespecialidad,$persona_idpersona, 
     $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado){
        $sql= "INSERT INTO `cita_medica` (`especialidad_idespecialidad`, `persona_idpersona`, 
        `fecha_cita`, `diagnostico`, `sintomas`, `motivo_consulta`,`horario_idhorario`, `estado_idestado`) 
        VALUES ('$especialidad_idespecialidad','$persona_idpersona', '$fecha_cita', '$diagnostico', '$sintomas', 
        '$motivo_consulta','$horario_idhorario', '$estado_idestado')"
        
        ;
        return ejecutarConsulta($sql);
    }
     //metodo para editar registros
     public function editar($idcita_medica,$especialidad_idespecialidad,$persona_idpersona, 
     $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado){
        $sql= "UPDATE `cita_medica` SET `especialidad_idespecialidad`='$especialidad_idespecialidad',`persona_idpersona`='$persona_idpersona', `fecha_cita`='$fecha_cita', 
         `diagnostico`='$diagnostico', `sintomas`='$sintomas', `motivo_consulta`='$motivo_consulta',`horario_idhorario`='$horario_idhorario', 
         `estado_idestado`='$estado_idestado' WHERE `idcita_medica`='$idcita_medica'";
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
        $sql= "SELECT cm.idcita_medica, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombre, 
                    p.`telefono`, cm.`fecha_cita`, h.`hora` as hora_cita, s.`nombre` AS estado       
        FROM `cita_medica` cm 
        INNER JOIN `estado` s ON cm.`estado_idestado`= s.`idestado`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`persona_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` ";

        return ejecutarConsulta($sql);
    }
    public function listarCitas(){
        $sql= "SELECT cm.idcita_medica, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as title , CONCAT(cm.fecha_cita,' ',h.hora) as start 
        FROM `cita_medica` cm
        INNER JOIN `horario` h ON h.`idhorario`=cm.`horario_idhorario`
        INNER JOIN `persona` p ON p.`idpersona`=cm.`persona_idpersona`";

        return ejecutarConsulta($sql);
    }
    public function insertarCita($especialidad_idespecialidad,$persona_idpersona, 
    $fecha_cita, $motivo_consulta, $horario_idhorario){
        $sql= "INSERT INTO `cita_medica` (`especialidad_idespecialidad`, `persona_idpersona`, `fecha_cita`, `diagnostico`, `sintomas`, `motivo_consulta`, `horario_idhorario`, `estado_idestado`) 
        VALUES ('$especialidad_idespecialidad', '$persona_idpersona', '$fecha_cita', '', '', '$motivo_consulta', '$horario_idhorario', '1')";
        return ejecutarConsulta($sql);
    }
    public function editarCita($idcita_medica,$especialidad_idespecialidad,$persona_idpersona, 
    $fecha_cita, $motivo_consulta, $horario_idhorario){
        $sql= "UPDATE `cita_medica` SET `especialidad_idespecialidad`='$especialidad_idespecialidad',`persona_idpersona`='$persona_idpersona', 
        `fecha_cita`='$fecha_cita', `motivo_consulta`='$motivo_consulta',`horario_idhorario`='$horario_idhorario'
        WHERE `idcita_medica`='$idcita_medica'";

        return ejecutarConsulta($sql);
    }
    public function mostrarCita($idcita_medica)
        {
            $sql= "SELECT `especialidad_idespecialidad`,`persona_idpersona`, `fecha_cita`,`motivo_consulta`,
            `horario_idhorario`
            FROM `cita_medica` 
            WHERE `idcita_medica`='$idcita_medica'";
            return ejecutarConsultaSimpleFila($sql);
        }
}
?>