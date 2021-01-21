<?php
 require "../config/Conexion.php";
 class Persona{
     public function __construct(){
        
     }

     //Metodo para insertar registros
     public function insertar($cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero, $roles){
        $sql= "INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`) 
        VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad_residencia', '$fecha_nacimiento', '$genero', 1)";

        $idpersonanew= ejecutarConsulta_retornarID($sql);
        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($roles)) { 
            //insertamos cada uno de los roles del usuario, con wihle recorremo todos los permisos asigandos
            $sql_detalle = "INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) 
                            VALUES('$idpersonanew','$roles[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos +1;
        }
        return $sw;
        
    }
     //metodo para editar registros
     public function editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                $ciudad_residencia, $fecha_nacimiento, $genero,$roles){
        $sql= "UPDATE `persona` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', `genero`='$genero'
        WHERE `idpersona`='$idpersona'";

        ejecutarConsulta($sql);
        //Eliminamos todos los roles asignados para volverlos a registrar
        $sqldel="DELETE FROM `persona_has_rol` WHERE `persona_idpersona`='$idpersona'";
        ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($roles)) { 
            //insertamos cada uno de los roles del usuario, con wihle recorriendo todos los roles asigandos
            $sql_detalle = "INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) 
                            VALUES('$idpersona','$roles[$num_elementos]')";
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
    public function listar(){
        $sql= "SELECT p.`idpersona`, p.`cedula`, p.`nombres`,p.`apellidos`,p.`email`, p.`telefono`,p.`direccion`,
                        p.`ciudad_residencia`, p.`fecha_nacimiento`,p.`genero`, p.`estado` 
                FROM `persona` p  
                INNER JOIN `persona_has_rol` pr ON p.`idpersona`=pr.`persona_idpersona` AND pr.`rol_idrol`=3";

        return ejecutarConsulta($sql);
    }
    public function listaMarcados($idpersona)
    {
        $sql= "SELECT * FROM `persona_has_rol` WHERE `persona_idpersona`='$idpersona'";        
        return ejecutarConsulta($sql);
    }

    //registra persona desde el formulario de registro en linea
    public function clienteRegistro($cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                                    $ciudad_residencia, $fecha_nacimiento, $genero){
        $sql_persona= "INSERT INTO `persona` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, 
                     `ciudad_residencia`, `fecha_nacimiento`, `genero`, `estado`) 
                     VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad_residencia', 
                                '$fecha_nacimiento', '$genero', 1)";

        $idpersonanew = ejecutarConsulta_retornarID($sql_persona);

        $sql_detalle = "INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) 
                        VALUES('$idpersonanew','3')";
                //enviamos la variable.. true si es de manera correcta
        return ejecutarConsulta($sql_detalle);
    }

}
?>