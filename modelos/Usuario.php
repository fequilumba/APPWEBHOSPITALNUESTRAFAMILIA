<?php
 require "../config/Conexion.php";
 class Usuario{
     public function __construct(){
        
     }
     //Metodo para insertar usuarioss
     public function insertar($cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen){
        
        $pieces = explode(" ", $nombres); 
        $str=""; 
        foreach($pieces as $piece) 
        { 
            $str.=$piece[0]; 
        }  
        
        $contrasenia= $cedula . $str;
        $sql= "INSERT INTO `usuario` (`cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, 
                `ciudad_residencia`, `fecha_nacimiento`, `genero`,`login`, `contrasenia`,`imagen`,`estado`) 
        VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion','$ciudad_residencia',
                '$fecha_nacimiento','$genero',/*login-cedula*/'$cedula','$contrasenia','$imagen','1')";

        return ejecutarConsulta($sql);
    }

     //metodo para editar o actualizar especialidad
     public function editar($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                            $ciudad_residencia, $fecha_nacimiento, $genero, $imagen){
        $pieces = explode(" ", $nombres); 
        $str=""; 
        foreach($pieces as $piece) 
        { 
        $str.=$piece[0]; 
        }  
                                
        $contrasenia= $cedula . $str;

        $sql= " UPDATE `usuario` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
                        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', 
                        `genero`='$genero',`login`='$cedula',`contrasenia`='$contrasenia',`imagen`='$imagen'
                WHERE `idusuario`='$idpersona'";
        //return ejecutarConsulta($sql);
        ejecutarConsulta($sql);
        //Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM `usuario_permiso` WHERE `usuario_idusuario`='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos)) { 
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_detalle = "INSERT INTO `usuario_permiso` (`usuario_idusuario`, `permiso_idpermiso`) 
                            VALUES('$idusuario','$permisos[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos +1;
        }
        return $sw;
    }

    public function editarUsuario($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                            $ciudad_residencia, $fecha_nacimiento, $genero, $imagen){
        $pieces = explode(" ", $nombres); 
        $str=""; 
        foreach($pieces as $piece) 
        { 
        $str.=$piece[0]; 
        }                      
        $contrasenia= $cedula . $str;

        $sql= " UPDATE `usuario` SET `cedula`='$cedula', `nombres`='$nombres', `apellidos`='$apellidos', `email`='$email', 
                        `telefono`='$telefono', `direccion`='$direccion', `ciudad_residencia`='$ciudad_residencia', `fecha_nacimiento`='$fecha_nacimiento', 
                        `genero`='$genero',`login`='$cedula',`contrasenia`='$contrasenia',`imagen`='$imagen'
                WHERE `idusuario`='$idpersona'";
        return ejecutarConsulta($sql);
        
    }

    //mostrar datos de un usuario especifico por id
    public function mostrar($idusuario)
        {
            $sql= "SELECT * FROM `usuario` WHERE `idusuario`='$idusuario'";
            return ejecutarConsultaSimpleFila($sql);
        }
    //METODOS PARA ACTIVAR/DESACTIVAR USUARIOS
    public function desactivar($idusuario)
    {
        $sql= "UPDATE `usuario` SET `estado`='0' 
               WHERE `idusuario`='$idusuario'";
        
        return ejecutarConsulta($sql);
    }

    public function activar($idusuario)
    {
        $sql= "UPDATE `usuario` SET `estado`='1' 
               WHERE `idusuario`='$idusuario'";
        
        return ejecutarConsulta($sql);
    }
    public function listar()
    {
        $sql= "SELECT u.`idusuario`, u.`cedula`, CONCAT(u.`nombres`, ' ' ,u.`apellidos`) as nombres, u.`email`, u.`telefono`, 
                    u.`direccion`, u.`ciudad_residencia`, u.`fecha_nacimiento`, u.`genero`, u.`login`, u.`imagen`, u.`estado`
                FROM `usuario` u";
        
        return ejecutarConsulta($sql);
    }
    public function listaMarcados($idusuario)
    {
        $sql= "SELECT * FROM `usuario_permiso` WHERE `usuario_idusuario`='$idusuario' ";        
        return ejecutarConsulta($sql);
    }
    public function verificar($login,$clave)
    {
        $sql= "SELECT u.`idusuario`, u.`cedula`,u.`nombres`,u.`apellidos`,u.`email`, u.`telefono`, 
        u.`direccion`, u.`ciudad_residencia`, u.`fecha_nacimiento`, u.`genero`, u.`login`, u.`imagen`, u.`estado` 
                FROM `usuario` u 
                WHERE `login`='$login' AND `contrasenia`='$clave' AND `estado`=1";        
        return ejecutarConsulta($sql);
    }
 }
?>