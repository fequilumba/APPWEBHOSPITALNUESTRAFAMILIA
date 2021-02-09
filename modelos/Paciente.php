<?php
 require "../config/Conexion.php";
 class Paciente{
     public function __construct(){
        
     }

     //Metodo para insertar registros de un paciente
     public function insertar($cedula, $nombres, $apellidos, $email, $telefono, 
     $direccion,$ciudad_residencia, $fecha_nacimiento, $genero,$idasociado,$imagen,$iduser){
        
    $sql_persona= "INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, 
                        `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`, `idasociado`, `imagen`, `usuario_idusuario`) 
                    VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion', '$ciudad_residencia', 
                        '$fecha_nacimiento', '$genero', '1', '$idasociado', '$imagen', '$iduser')";

        $idpersonanew = ejecutarConsulta_retornarID($sql_persona);
        $sql_rolu = "INSERT INTO `usuario_has_rol` (`usuario_idusuario`, `rol_idrol`) 
                        VALUES('$iduser','4')";
        ejecutarConsulta($sql_rolu);             
        $sql_rolp = "INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) 
                        VALUES('$idpersonanew','4')";
        return ejecutarConsulta($sql_rolp);
    }
     //metodo para editar registros de un paciente registrado por un cliente
     public function editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero){
        $sql= "UPDATE `persona` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', `genero`='$genero'
        WHERE `idpersona`='$idpersona'";

        return ejecutarConsulta($sql);
    }
    //mostrar un registro para editar
    public function mostrar($idpersona)
        {
            $sql= "SELECT * FROM `persona` WHERE `idpersona`='$idpersona'";
    
            return ejecutarConsultaSimpleFila($sql);
        }
    //METODOS PARA ACTIVAR/DESACTIVAR CLIENTES
    public function desactivar($idpersona)
    {
        $sql= " UPDATE `persona` SET `estado` = '0' 
                WHERE `idpersona` = '$idpersona'";
       
        return ejecutarConsulta($sql);
    }

    public function activar($idpersona)
    {
        $sql= " UPDATE `persona` SET `estado` = '1' 
                WHERE `idpersona` = '$idpersona'";
        
        return ejecutarConsulta($sql);
    }
    //listar pacientes
    public function listar($idasociado){
        $sql= "SELECT p.`idpersona`, p.`cedula`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres,p.`email`, p.`telefono`,p.`direccion`,
        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
        FROM `persona` p  
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=4 AND p.`idasociado`='$idasociado'";

        return ejecutarConsulta($sql);
    }
    public function listarTodosPacientes(){
        $sql= "SELECT p.`idpersona`, p.`cedula`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres,p.`email`, p.`telefono`,p.`direccion`,
        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
        FROM `persona` p  
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=4";

        return ejecutarConsulta($sql);
    }
    public function selectPaciente($idasociado){
        $sql= "SELECT p.`idpersona`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres 
        FROM `persona` p
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` 
        AND pr.`rol_idrol`=4 and p.estado=1
        AND p.`idasociado`='$idasociado'";

        return ejecutarConsulta($sql);
    }
    public function selectPacienteM(){
        $sql= "SELECT p.`idpersona`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres 
        FROM `persona` p
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` 
        AND pr.`rol_idrol`=4 and p.estado=1";

        return ejecutarConsulta($sql);
    }
    public function selectTodosPacientes(){
        $sql= "SELECT p.`idpersona`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres 
        FROM `persona` p
        INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` 
        AND pr.`rol_idrol`=4 and p.estado=1";

        return ejecutarConsulta($sql);
    }

}
?>