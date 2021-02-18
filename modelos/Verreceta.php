<?php
 require "../config/Conexion.php";
 class Verreceta{
     public function __construct(){
        
     }
     public function listar($idusuario){
        $sql= "SELECT r.idreceta, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `receta` r
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=r.`cita_medica_idcita_medica`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        AND p.`idasociado`='$idusuario'
        ORDER BY r.`idreceta` DESC";
        return ejecutarConsulta($sql);
     }
     public function listarRecetaMedica($idpersonam){
        $sql= "SELECT r.idreceta, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `receta` r
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=r.`cita_medica_idcita_medica`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        AND cm.`personaMedico_idpersona`='$idpersonam'
        ORDER BY r.`idreceta` DESC";
        return ejecutarConsulta($sql);
     }

     public function listarTodo(){
        $sql= "SELECT r.idreceta, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
        CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, h.`hora` as hora_cita   
        FROM `receta` r
        INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=r.`cita_medica_idcita_medica`
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        ORDER BY r.`idreceta` DESC";
        return ejecutarConsulta($sql);
     }
     
    //mostrar datos de una receta por id
    public function mostrar($idreceta)
        {
            $sql= "SELECT r.idreceta, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico  
            FROM `receta` r
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`=r.`cita_medica_idcita_medica` 
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
            WHERE r.`idreceta`='$idreceta'";
            return ejecutarConsultaSimpleFila($sql);
        }
   public function listarDetalle($idreceta)
   {
      $sql= "SELECT mr.`medicamento_idmedicamento`, m.`nombre`, m.`descripcion`, mr.`cantidad`, mr.`observaciones`
               FROM `medicamento_has_receta` mr
               INNER JOIN `receta` r ON r.`idreceta`= mr.`receta_idreceta` 
               INNER JOIN `medicamento` m ON m.`idmedicamento`= mr.`medicamento_idmedicamento` 
               WHERE r.`idreceta`='$idreceta'";
            return ejecutarConsulta($sql);
   }
   public function recetacabecera($idreceta)
   {
      $sql= "SELECT e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            CONCAT(pm.`nombres`, ' ' ,pm.`apellidos`) as medico, cm.`fecha_cita`, p.email, p.genero
            FROM `receta` r 
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= r.`cita_medica_idcita_medica` 
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `persona` pm ON pm.`idpersona`=cm.`personaMedico_idpersona`
            WHERE r.`idreceta`='$idreceta'";
            return ejecutarConsulta($sql);
   }
 }
?>