<?php
 require "../config/Conexion.php";
 class Medico{
     public function __construct(){
        
     }

     //Metodo para insertar registros del medico
     public function insertar($especialidad_idespecialidad ,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad, $fnacimiento, $genero){

        $sql="INSERT INTO `persona` (`especialidad_idespecialidad`, `cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`) 
                VALUES ('3', '$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion', '$ciudad', '$fnacimiento', '$genero', 1);";
        return ejecutarConsulta($sql);
        
    }
     //metodo para editar registros del medico
     public function editar($idpersona,$especialidad_idespecialidad, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad, $fnacimiento, $genero){
        $sql= "UPDATE `persona` SET `persona`.`especialidad_idespecialidad`='$especialidad_idespecialidad',`persona`.`cedula`='$cedula', `persona`.`nombres`='$nombres', `persona`.`apellidos`='$apellidos', `persona`.`email`='$email', 
        `persona`.`telefono`='$telefono', `persona`.`direccion`='$direccion', `persona`.`ciudad_residencia`='$ciudad', `persona`.`fecha_nacimiento`='$fnacimiento', `persona`.`genero`='$genero'
        WHERE `persona`.`idpersona`='$idpersona'";

        return ejecutarConsulta($sql);
    }
    //mostrar el registro de un medico para editar
    public function mostrar($idpersona)
        {
            $sql= "SELECT * FROM `persona` WHERE `persona`.`idpersona`='$idpersona'";
            return ejecutarConsultaSimpleFila($sql);
        }

    //mostrar datos de un medico especifico

    public function listar(){
        $sql= "SELECT p.`idpersona`,e.`nombre` AS especialidad, p.`cedula`, p.`nombres`,p.`apellidos`,p.`email`, p.`telefono`,p.`direccion`,
                        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
                FROM `persona` p 
                INNER JOIN `especialidad` e ON p.`especialidad_idespecialidad`=e.`idespecialidad` 
                INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=2";

        return ejecutarConsulta($sql);
    }
    //METODOS PARA ACTIVAR/DESACTIVAR MEDICOS
    public function desactivar($idpersona)
    {
        $sql= " UPDATE `persona` SET `persona`.`estado` = '0' 
                WHERE `persona`.`idpersona` = '$idpersona'";
       
        return ejecutarConsulta($sql);
    }

    public function activar($idpersona)
    {
        $sql= " UPDATE `persona` SET `persona`.`estado` = '1' 
                WHERE `persona`.`idpersona` = '$idpersona'";
        
        return ejecutarConsulta($sql);
    }

 }
?>