<?php
 require "../config/Conexion.php";
 class Persona{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad, $fnacimiento, $genero){
        $sql= "INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `ciudad_residencia`, `fecha_nacimiento`, `genero`) 
        VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad', '$fnacimiento', '$genero')";

        return ejecutarConsulta($sql);
        
    }
     //metodo para editar registros
     public function editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad, $fnacimiento, $genero){
        $sql= "UPDATE `persona` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad', `fecha_nacimiento`='$fnacimiento', `genero`='$genero'
        WHERE `idpersona`='$idpersona'";

        return ejecutarConsulta($sql);
    }
    //eliminar registros
    public function eliminar($idpersona){
        $sql= "DELETE FROM `persona`  WHERE `idpersona`='$idpersona'";

        return ejecutarConsulta($sql);
    }
    //listar pacientes
    public function mostrarPaciente(){
        $sql= "SELECT `persona`.`idpersona`, `persona`.`cedula`, `persona`.`nombres`,`persona`.`apellidos`,`persona`.`email`,`persona`.`telefono`,`persona`.`direccion`
        ,`persona`.`ciudad_residencia`,`persona`.`fecha_nacimiento`,`persona`.`genero` 
        FROM `persona`, `persona_has_rol` 
        where `persona`.`idpersona`=`persona_has_rol`.`persona_idpersona` 
        AND `persona_has_rol`.`rol_idrol`=3";

        return ejecutarConsulta($sql);
    }
    //listar roles
    public function listaRoles(){
        $sql= "SELECT * FROM `rol`";

        return ejecutarConsultaSimpleFila($sql);
    }
    //////////////medicos/////////////
    public function mostrarMedicos($idpersona){
        $sql= "SELECT `persona`.`idpersona`, `persona`.`cedula`, `persona`.`nombres`,`persona`.`apellidos`,`persona`.`email`,`persona`.`telefono`,`persona`.`direccion`
        ,`persona`.`ciudad_residencia`,`persona`.`fecha_nacimiento`,`persona`.`genero` 
        FROM `persona`, `persona_has_rol` 
        where `persona`.`idpersona`=`persona_has_rol`.`persona_idpersona` 
        AND `persona_has_rol`.`rol_idrol`=2";

        return ejecutarConsulta($sql);
    }
    


 }
?>