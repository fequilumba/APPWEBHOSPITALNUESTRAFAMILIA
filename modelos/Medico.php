<?php
 require "../config/Conexion.php";
 class Medico{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero,$especialidades){
        $sql= "INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`) 
        VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad_residencia', '$fecha_nacimiento', '$genero', 1)";
        //return ejecutarConsulta($sql);
        $idpersonanew=ejecutarConsulta_retornarID($sql);
        //$idpersonanew2=ejecutarConsulta_retornarID($sql);
        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($especialidades)) { //mientras que el numero de elementos sea menor que la cantidad de especialdiades escogidas
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_detalle = "INSERT INTO `persona_has_especialidad` (`persona_idpersona`, `especialidad_idespecialidad`) 
            VALUES ('$idpersonanew', '$especialidades[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos +1;
        }
        /*while ($num_elementos_rol < count($roles)) { //mientras que el numero de elementos sea menor que la cantidad de especialdiades escogidas
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_rol = "INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) 
                            VALUES('$idpersonanew2','$roles[$num_elementos_rol]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_rol) or $sw = false;
            $num_elementos_rol=$num_elementos_rol +1;
        }*/

        return $sw;
    }
     //metodo para editar registros
     public function editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero,$especialidades){
        $sql= "UPDATE `persona` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', `genero`='$genero'
        WHERE `idpersona`='$idpersona'";
        ejecutarConsulta($sql);
        //eliminar todas las especialidades asignadas para volver a registrarlos
        $sqldel="DELETE FROM `persona_has_especialidad` WHERE `persona_idpersona`='$idpersona'";
        ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($especialidades)) { //mientras que el numero de elementos sea menor que la cantidad de especialdiades escogidas
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_detalle = "INSERT INTO `persona_has_especialidad` (`persona_idpersona`, `especialidad_idespecialidad`) 
            VALUES ('$idpersona', '$especialidades[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos +1;
        }
        return $sw;
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
        $sql= "SELECT p.`idpersona`,e.`nombre`, p.`cedula`, CONCAT(p.`nombres`, ' ' ,p.`apellidos`) as nombres,p.`email`, p.`telefono`,p.`direccion`,
                        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
                FROM `persona` p 
                INNER JOIN `persona_has_especialidad` pe ON p.`idpersona`=pe.`persona_idpersona`
                INNER JOIN `especialidad` e ON pe.`especialidad_idespecialidad`=e.`idespecialidad`
                INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=2";

        return ejecutarConsulta($sql);
    }
    //listar roles
    public function listaRoles(){
        $sql= "SELECT * FROM `rol`";

        return ejecutarConsultaSimpleFila($sql);
    }
    public function listaMarcados($idpersona){
        $sql= "SELECT * FROM `persona_has_especialidad` WHERE persona_idpersona='$idpersona'";

        return ejecutarConsulta($sql);
    }
    
}
?>