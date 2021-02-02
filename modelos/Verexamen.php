<?php
 require "../config/Conexion.php";
 class Verexamen{
     public function __construct(){
        
     }
     public function listar($idusuario){
        $sql= "SELECT te.idtipo_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `tipo_examen` te 
        INNER JOIN `cita_medica_has_tipo_examen` ce ON ce.`tipo_examen_idtipo_examen`= te.`idtipo_examen`
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= ce.`cita_medica_idcita_medica` 
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        AND p.`idasociado`='$idusuario'
        ORDER BY te.`idtipo_examen` DESC";
        return ejecutarConsulta($sql);
     }

     public function listarTodo(){
        $sql= "SELECT te.idtipo_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `tipo_examen` te 
        INNER JOIN `cita_medica_has_tipo_examen` ce ON ce.`tipo_examen_idtipo_examen`= te.`idtipo_examen`
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= ce.`cita_medica_idcita_medica` 
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        ORDER BY te.`idtipo_examen` DESC";
        return ejecutarConsulta($sql);
     }
     
    //mostrar datos de una examen por id
    public function mostrar($idtipo_examen)
        {
            $sql= "SELECT te.idtipo_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, te.`nombre` as examen   
            FROM `tipo_examen` te 
            INNER JOIN `cita_medica_has_tipo_examen` ce ON ce.`tipo_examen_idtipo_examen`= te.`idtipo_examen`
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= ce.`cita_medica_idcita_medica` 
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
            AND te.`idtipo_examen`='$idtipo_examen'";
            return ejecutarConsultaSimpleFila($sql);
        }

 }
?>