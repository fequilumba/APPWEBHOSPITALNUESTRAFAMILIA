<?php
 require "../config/Conexion.php";
 class Horario{
     public function __construct(){
        
     }
     public function listar(){
        $sql= "SELECT cm.`idcita_medica`, e.`nombre`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as medico, 
        cm.`fecha_cita`, h.`hora`
        FROM `cita_medica` cm
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad`
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaMedico_idpersona`
        INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` 
        AND estado_idestado=4";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar horarios disponibles
     public function insertar($especialidad_idespecialidad,$personaMedico_idpersona, $fecha_cita,$horarios){
        $num_elementos=0;
        $sw=true;
        while ($num_elementos < count($horarios)) {
        $clavemedico= $personaMedico_idpersona."-".$fecha_cita."-".$horarios[$num_elementos];
        
        $sql= "INSERT INTO `cita_medica` (`especialidad_idespecialidad`, `personaPaciente_idpersona`, `personaMedico_idpersona`, 
            `fecha_cita`, `diagnostico`, `sintomas`, `motivo_consulta`, `horario_idhorario`, `estado_idestado`, `clavemedico`) 
            VALUES ($especialidad_idespecialidad, NULL, '$personaMedico_idpersona', '$fecha_cita', NULL, NULL, NULL, '$horarios[$num_elementos]', '4', 
            '$clavemedico')";
                        ejecutarConsulta($sql) or $sw = false;
                        $num_elementos=$num_elementos +1;
            }
            return $sw;
    }
    //Metodo para listar las horas
    public function selectHorario(){
        $sql= "SELECT * FROM `horario` ORDER BY `hora`";
        return ejecutarConsulta($sql);
     }
    public function eliminarHora($idcita_medica)
    {
        $sql= "DELETE FROM `cita_medica` WHERE `cita_medica`.`idcita_medica` = '$idcita_medica'";
        return ejecutarConsulta($sql);
    }
 }
?>