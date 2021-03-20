<?php
 require "../config/Conexion.php";
 class Calendario{
     public function __construct(){
        
     }

    
     //metodo para editar registros
     public function editar($idcita_medica,$especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                            $fecha_cita, $motivo_consulta){
        $sql= " UPDATE `cita_medica` SET `personaPaciente_idpersona` = '$personaPaciente_idpersona',
                                        `motivo_consulta` = '$motivo_consulta',
                                        `estado_idestado`=1
                WHERE `idcita_medica` = '$idcita_medica' 
                AND `especialidad_idespecialidad` = '$especialidad_idespecialidad'
                AND `personaMedico_idpersona` = '$personaMedico_idpersona'";
        return ejecutarConsulta($sql);
    }
    public function listarCitas(){
        $sql= "SELECT cm.idcita_medica, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as title , CONCAT(cm.fecha_cita,' ',h.hora) as start 
                        , e.nombre as especialidad
        FROM `cita_medica` cm
        INNER JOIN `horario` h ON h.`idhorario`=cm.`horario_idhorario`
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `especialidad` e ON e.`idespecialidad`=cm.`especialidad_idespecialidad`";

        return ejecutarConsulta($sql);
    }
    
    public function listarCitasAsociadas($idasociado){
        $sql= "SELECT cm.idcita_medica, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as title , CONCAT(cm.fecha_cita,' ',h.hora) as start 
                        , e.nombre as especialidad
        FROM `cita_medica` cm
        INNER JOIN `horario` h ON h.`idhorario`=cm.`horario_idhorario`
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
        INNER JOIN `especialidad` e ON e.`idespecialidad`=cm.`especialidad_idespecialidad`
        where p.idasociado='$idasociado'";

        return ejecutarConsulta($sql);
    }
    public function selecthora($especialidad,$personaMedico,$fecha){
        $sql= "SELECT cm.idcita_medica, CONCAT(cm.`fecha_cita`, ' ' ,h.`hora`) as fecha
        FROM `cita_medica` cm 
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad` 
        INNER JOIN `persona` p ON p.`idpersona`=cm.`personaMedico_idpersona`
	    INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario`
        WHERE cm.`estado_idestado`=4 AND cm.`personaMedico_idpersona`='$personaMedico' 
        	AND cm.`especialidad_idespecialidad`='$especialidad' AND cm.`fecha_cita`='$fecha'";
        return ejecutarConsulta($sql);
     }
    
}
/*date_default_timezone_set("America/Guayaquil");
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
        
        echo json_encode($resp);*/

        

?>