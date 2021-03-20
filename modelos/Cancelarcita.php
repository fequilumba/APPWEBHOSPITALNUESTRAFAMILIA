<?php
require "../config/Conexion.php";
class Cancelarcita{
public function __construct(){
        
}

public function listarCitaCancelar()
    {
        $sql="SELECT cm.idcita_medica, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
                CONCAT(m.`nombres`, ' ' ,m.`apellidos`) as medico, p.`telefono`, cm.`fecha_cita`, h.`hora` as hora_cita       
                FROM `cita_medica` cm 
                INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
                INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
                INNER JOIN `persona` m ON m.`idpersona`=cm.`personaMedico_idpersona`
                INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
                WHERE cm.`estado_idestado`=1";
        return ejecutarConsulta($sql);
    }


public function eliminarCita($idcita_medica)
        {
            $sql= "UPDATE `cita_medica` 
            SET `personaPaciente_idpersona` = NULL,
            `motivo_consulta` = NULL,
            `estado_idestado`=4
            WHERE `idcita_medica` = '$idcita_medica'";
    
            return ejecutarConsulta($sql);
        }
}
?>