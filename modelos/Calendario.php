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
    
    
}
date_default_timezone_set("America/Guayaquil");
        echo ("\n");
        $fechasistema= date("Y-m-d");
        echo ($fechasistema);
        $horasistema = date("H:i:s");
        echo ($horasistema);

    $sql= "SELECT cm.idcita_medica, CONCAT(cm.`fecha_cita`, ' ' ,h.`hora`) as fecha
        FROM `cita_medica` cm 
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaMedico_idpersona`
	    INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        WHERE cm.`estado_idestado`=4 AND cm.`personaMedico_idpersona`=6 
        	AND cm.`especialidad_idespecialidad`=3 AND cm.`fecha_cita`>='$fechasistema'
            AND h.`hora`>= '$horasistema'";

        $resp=ejecutarConsultaSimpleFila($sql);
        
        echo json_encode($resp);

        

?>