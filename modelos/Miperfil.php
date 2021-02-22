<?php
 require "../config/Conexion.php";
 class Perfil{
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
                                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen){
        $sql= "UPDATE `persona` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
                    `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', 
                    `genero`='$genero', `imagen`='$imagen'
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
    public function listar($idusuario){
        $sql= "SELECT p.`idpersona`, p.`cedula`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres,p.`email`, p.`telefono`,
        p.`imagen`,p.`estado` 
        FROM `persona` p   
        WHERE p.`usuario_idusuario`='$idusuario'";

        return ejecutarConsulta($sql);
    }

}
?>