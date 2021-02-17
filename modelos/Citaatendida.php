<?php
 require "../config/Conexion.php";
 class Citaatendida{
     public function __construct(){
        
     }
     public function listar($idusuario){
        $sql= "SELECT cm.idcita_medica, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombre, 
        p.`telefono`, cm.`fecha_cita`, h.`hora` as hora_cita, s.`nombre` AS estado       
        FROM `cita_medica` cm 
        INNER JOIN `estado` s ON cm.`estado_idestado`= s.`idestado`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` WHERE
        cm.`personaMedico_idpersona`='$idusuario' AND cm.`estado_idestado`=2";
        return ejecutarConsulta($sql);
     }
    //mostrar datos de una especialdiad por id
    public function mostrar($idtipo_examen)
        {
            $sql= "SELECT te.`idtipo_examen`, CONCAT(e.`nombre`, ' - ' ,cm.`fecha_cita`, ' - ' ,p.`nombres`, ' - ' ,p.`apellidos`) as cita, 
            te.`nombre`
            FROM `tipo_examen` te
            INNER JOIN `cita_medica_has_tipo_examen` cme ON cme.`tipo_examen_idtipo_examen`= te.`idtipo_examen`
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= cme.`cita_medica_idcita_medica`
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad`
            INNER JOIN `persona` p ON p.`idpersona`= cm.`personaPaciente_idpersona`
            INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona`
            AND pr.`rol_idrol`=4 and p.estado=1       
            AND `idtipo_examen`='$idtipo_examen'";
            return ejecutarConsultaSimpleFila($sql);
        }

 }
?>