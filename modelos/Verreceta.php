<?php
 require "../config/Conexion.php";
 class Verreceta{
     public function __construct(){
        
     }
     public function listar($idusuario){
        $sql= "SELECT cm.idcita_medica, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `cita_medica` cm 
        INNER JOIN `estado` s ON cm.`estado_idestado`= s.`idestado`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        AND p.`idasociado`='$idusuario'
        ORDER BY cm.`idcita_medica` DESC";
        return ejecutarConsulta($sql);
     }
     
    //mostrar datos de una cita por id
    public function mostrar($idcita_medica)
        {
            $sql= "SELECT cm.`idcita_medica`, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`diagnostico`, r.`observaciones`, r.`medicamentos`  
            FROM `cita_medica` cm 
            INNER JOIN `receta` r ON r.`cita_medica_idcita_medica`= cm.`idcita_medica` 
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
            WHERE cm.`idcita_medica`='$idcita_medica'";
            return ejecutarConsultaSimpleFila($sql);
        }
 }
?>