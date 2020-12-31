<?php
 require "../config/Conexion.php";
 class Medico{
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
    //mostrar un registro para editar
    public function mostrar($idpersona)
        {
            $sql= "SELECT * FROM `persona` WHERE `idpersona`='$idpersona'";
            return ejecutarConsultaSimpleFila($sql);
        }

    //eliminar registros
    public function eliminar($idpersona){
        $sql= "DELETE FROM `persona`  WHERE `idpersona`='$idpersona'";
        return ejecutarConsulta($sql);
    }
    //////////////medicos/////////////
    public function mostrarMedico(){
        $sql= "SELECT p.`cedula`, e.`nombre`, p.`nombres`,p.`apellidos`,p.`email`, p.`telefono`,p.`direccion`,
                        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
                FROM `persona` p 
                INNER JOIN `especialidad` e ON p.`especialidad_idespecialidad`=e.`idespecialidad` 
                INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=2";

        return ejecutarConsulta($sql);
    }
    public function selectEspecialidad(){
        $sql= "SELECT * FROM `especialidad`";

        return ejecutarConsulta($sql);
    }
    //METODOS PARA ACTIVAR/DESACTIVAR MEDICOS
    public function desactivar($idpersona)
    {
        $sql= "UPDATE `persona` SET `estado`='0' 
               WHERE `idpersona`='$idpersona'";
        
        return ejecutarConsulta($sql);
    }

    public function activar($idespecialidad)
    {
        $sql= "UPDATE `persona` SET `estado`='1' 
               WHERE `idpersona`='$idpersona'";
        
        return ejecutarConsulta($sql);
    }

 }
?>