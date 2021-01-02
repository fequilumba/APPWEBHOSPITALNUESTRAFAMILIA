<?php
 require "../config/Conexion.php";
 class Medico{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($especialidad_idespecialidad,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero){
        $sql= "INSERT INTO `persona` (`especialidad_idespecialidad`,`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`) 
        VALUES ('$especialidad_idespecialidad','$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad_residencia', '$fecha_nacimiento', '$genero', 1)";

        return ejecutarConsulta($sql);
        
    }
     //metodo para editar registros
     public function editar($idpersona,$especialidad_idespecialidad, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero){
        $sql= "UPDATE `persona` SET `especialidad_idespecialidad`='$especialidad_idespecialidad',`cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
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
    //METODOS PARA ACTIVAR/DESACTIVAR MEDICO
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
    //listar Medicos
    public function listar(){
        $sql= "SELECT p.`idpersona`,e.`nombre`, p.`cedula`, p.`nombres`,p.`apellidos`,p.`email`, p.`telefono`,p.`direccion`,
                        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
                FROM `persona` p 
                INNER JOIN `especialidad` e ON p.`especialidad_idespecialidad`=e.`idespecialidad`  
                INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=2";

        return ejecutarConsulta($sql);
    }
    //listar roles
    public function listaRoles(){
        $sql= "SELECT * FROM `rol`";

        return ejecutarConsultaSimpleFila($sql);
    }
    
}
?>