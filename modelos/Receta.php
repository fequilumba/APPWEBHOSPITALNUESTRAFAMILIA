<?php
 require "../config/Conexion.php";
 class Receta{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($observaciones,$medicamentos,$seleccita){
        $sql= "INSERT INTO `receta` (`observaciones`, `medicamentos`, `cita_medica_idcita_medica`) 
        VALUES ('$observaciones', '$medicamentos', '$seleccita')";
        return ejecutarConsulta($sql);
    }
     //metodo para editar registros
     public function editar($idreceta,$observaciones,$medicamentos){
        $sql= "UPDATE `receta` SET `observaciones`='$observaciones',`medicamentos`='$medicamentos'
        WHERE `idreceta`='$idreceta'";
        return ejecutarConsulta($sql);
    }
    //mostrar un registro para editar
    public function mostrar($idreceta)
        {
            $sql= "SELECT r.`idreceta`, r.`cita_medica_idcita_medica`,r.`observaciones`, r.`medicamentos`, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            cm.`fecha_cita` , h.`hora` as hora_cita      
            FROM `receta` r 
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= r.`cita_medica_idcita_medica`
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`= e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` AND `idreceta`='$idreceta'";
    
            return ejecutarConsultaSimpleFila($sql);
        }

    public function ver($idreceta)
        {
            $sql= "SELECT r.`idreceta`, r.`observaciones`, r.`medicamentos`, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
            cm.`fecha_cita` , h.`hora` as hora_cita      
            FROM `receta` r 
            INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= r.`cita_medica_idcita_medica`
            INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`= e.`idespecialidad` 
            INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
            INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` AND `idreceta`='$idreceta'";
    
            return ejecutarConsultaSimpleFila($sql);
        }
    //listar citas
    public function listar($idusuario){
        $sql= "SELECT r.`idreceta`, e.`nombre` AS especialidad, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as paciente, 
                cm.`fecha_cita` , h.`hora` as hora_cita      
                FROM `receta` r 
                INNER JOIN `cita_medica` cm ON cm.`idcita_medica`= r.`cita_medica_idcita_medica`
                INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`= e.`idespecialidad` 
                INNER JOIN `persona` p ON p.`idpersona`=cm.`personaPaciente_idpersona`
                INNER JOIN `horario` h ON cm.`horario_idhorario`= h.`idhorario` 
                AND cm.`estado_idestado`=2
                AND cm.`personaMedico_idpersona`='$idusuario'";

        return ejecutarConsulta($sql);
    }

    public function selectCita($idusuario)
    {

        $sql= "SELECT cm.`idcita_medica`, CONCAT(e.`nombre`, ' - ' ,cm.`fecha_cita`, ' - ' ,p.`nombres`, ' - ' ,p.`apellidos`) as nombres 
        FROM `cita_medica` cm 
        INNER JOIN `especialidad` e ON cm.`especialidad_idespecialidad`=e.`idespecialidad`
        INNER JOIN `persona` p ON p.`idpersona`= cm.`personaPaciente_idpersona`
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona`
        AND pr.`rol_idrol`=4 AND p.estado=1 AND cm.`estado_idestado`=2
        AND cm.`personaMedico_idpersona`='$idusuario'";

        return ejecutarConsulta($sql);
    }

}
?>