<?php
 require "../config/Conexion.php";

 class Verexamen {
     public function __construct(){
        
     }

     public function listar($idusuario){
        $sql= "SELECT pe.idpedido_examen, e.nombre AS especialidad, CONCAT(p.nombres, ' ' ,p.apellidos) as paciente, 
        CONCAT(pm.nombres, ' ' ,pm.apellidos) as medico, cm.fecha_cita, h.hora as hora_cita   
        FROM pedido_examen pe
        INNER JOIN cita_medica cm ON cm.idcita_medica = pe.cita_medica_idcita_medica
        INNER JOIN especialidad e ON cm.especialidad_idespecialidad = e.idespecialidad 
        INNER JOIN persona p ON p.idpersona = cm.personaPaciente_idpersona
        INNER JOIN persona pm ON pm.idpersona = cm.personaMedico_idpersona
        INNER JOIN horario h ON cm.horario_idhorario = h.idhorario
        AND p.idasociado='$idusuario'
        ORDER BY pe.idpedido_examen DESC";
        return ejecutarConsulta($sql);
     }

     public function listarExamenMedico($idpersonam){
        $sql= "SELECT pe.idpedido_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `pedido_examen` pe
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=pe.`cita_medica_idcita_medica`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        AND cm.`personaMedico_idpersona`='$idpersonam'
        ORDER BY pe.`idpedido_examen` DESC";
        return ejecutarConsulta($sql);
     }

     public function listarTodo(){
        $sql= "SELECT pe.idpedido_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `pedido_examen` pe
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=pe.`cita_medica_idcita_medica`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        ORDER BY pe.`idpedido_examen` DESC";
        return ejecutarConsulta($sql);
     }
     
    //mostrar datos de una examen por id
    public function mostrar($idpedido_examen)
        {
            $sql= "SELECT pe.idpedido_examen, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico  
            FROM `pedido_examen` pe 
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= pe.`cita_medica_idcita_medica` 
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
            AND pe.`idpedido_examen`='$idpedido_examen'";
            return ejecutarConsultaSimpleFila($sql);
        }
        
   //listar los detalles de un pedido de examenes
   public function listarDetalle($idpedido_examen)
   {
      $sql= "SELECT pe.`pedido_examen_idpedido_examen`, e.`nombre`, te.`nombre` as tipo
            FROM `examen_has_pedido_examen` pe
            INNER JOIN `pedido_examen` p ON p.`idpedido_examen`= pe.`pedido_examen_idpedido_examen`
            INNER JOIN `examen` e ON e.`idexamen`= pe.`examen_idexamen` 
            INNER JOIN `tipo_examen` te ON te.`idtipo_examen`= e.`tipo_examen_idtipo_examen` 
            WHERE p.`idpedido_examen`='$idpedido_examen'";
            return ejecutarConsulta($sql);
   }

   public function examencabecera($idpedido_examen)
   {
      $sql= "SELECT e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
               CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, p.email, p.genero   
               FROM `pedido_examen` pe
               INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=pe.`cita_medica_idcita_medica`
               INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
               INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
               INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
               INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
               WHERE pe.`idpedido_examen`='$idpedido_examen'";
            return ejecutarConsulta($sql);
   }

 }
?>