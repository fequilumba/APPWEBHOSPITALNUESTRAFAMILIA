<?php
 require "../config/Conexion.php";
 class Agendar{
     public function __construct(){
        
     }
     public function listar(){
        $sql= "SELECT * FROM `especialidad`";
        return ejecutarConsulta($sql);
     }
     //Metodo para insertar especialdiad
     public function insertar($nombre){
        $sql= "INSERT INTO `especialidad` (`nombre`, `estado`) 
        VALUES ('$nombre','1')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar o actualizar especialidad
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
?>