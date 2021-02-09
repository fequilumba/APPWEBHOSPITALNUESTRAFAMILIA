<?php
 require "../config/Conexion.php";
 class Usuario{
     public function __construct(){
        
     }
     //Metodo para insertar Clientes desde el form de registro
     public function insertar($cedula,$contraseniahash){

        $sql= "INSERT INTO `usuario` (`login`, `contrasenia`) 
        VALUES ('$cedula','$contraseniahash')";
        return ejecutarConsulta_retornarID($sql);

    }
    //insetar paciente en la tabla usuario y con el rol de usuario paciente
    /*public function insertarUPaciente($cedula,$contraseniahash){
        
        
        $sql= "INSERT INTO `usuario` (`login`, `contrasenia`) 
        VALUES ('$cedula','$contraseniahash')";

        return ejecutarConsulta_retornarID($sql);
    }
    
    public function insertarUMedico($cedula,$contraseniahash){
        
        $sql= "INSERT INTO `usuario` (`login`, `contrasenia`) 
        VALUES ('$cedula','$contraseniahash')";

        return ejecutarConsulta_retornarID($sql);
        
    }*/
     //metodo para editar o actualizar un paciente 
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

    /*public function editarUsuario($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
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
        
    }*/
    /*public function editarUMedico($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                            $ciudad_residencia, $fecha_nacimiento, $genero, $imagen,$roles){
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
        ejecutarConsulta($sql);
        $sqldel="DELETE FROM `usuario_has_rol` WHERE `usuario_idusuario`='$idpersona'";
        ejecutarConsulta($sqldel);
        $num_elementos=0;
        $sw=true;
        while ($num_elementos < count($roles)) { //mientras que el numero de elementos sea menor que la cantidad de especialdiades escogidas
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_rol = "INSERT INTO `usuario_has_rol` (`usuario_idusuario`, `rol_idrol`) 
                            VALUES('$idpersona','$roles[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_rol) or $sw = false;
            $num_elementos  =$num_elementos +1;
        }
        return $sw;
        
    }*/

    //mostrar datos de un usuario especifico por id
    /*public function mostrar($idusuario)
        {
            $sql= "SELECT * FROM `usuario` WHERE `idusuario`='$idusuario'";
            return ejecutarConsultaSimpleFila($sql);
        }*/
    //METODOS PARA ACTIVAR/DESACTIVAR USUARIOS
    /*public function desactivar($idusuario)
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
    }*/
    /*public function listar()
    {
        $sql= "SELECT u.`idusuario`, u.`cedula`, CONCAT(u.`nombres`, ' ' ,u.`apellidos`) as nombres, u.`email`, u.`telefono`, 
                    u.`direccion`, u.`ciudad_residencia`, u.`fecha_nacimiento`, u.`genero`, u.`login`, u.`imagen`, u.`estado`
                FROM `usuario` u";
        
        return ejecutarConsulta($sql);
    }*/
    public function listaMarcados($rol_idrol)
    {
        $sql= "SELECT * FROM `rol_has_permiso` WHERE `rol_idrol`='$rol_idrol' ";        
        return ejecutarConsulta($sql);
    }
    
    public function verificar($login,$clavehash,$rol_idrol)
    {
        $sql= "SELECT u.`idusuario`,p.`nombres`, p.`imagen`, u.`login`, ur.`rol_idrol`, p.`idpersona`
                FROM `usuario` u 
                INNER JOIN usuario_has_rol ur ON u.`idusuario`= ur.`usuario_idusuario`
                INNER JOIN persona p ON p.`usuario_idusuario`= u.`idusuario`
                WHERE u.`login`='$login' AND u.`contrasenia`='$clavehash' AND p.`estado`=1 AND ur.rol_idrol='$rol_idrol'";        
        return ejecutarConsulta($sql);
    }

    public function selectRol()
    {
        $sql= "SELECT * FROM `rol`";        
        return ejecutarConsulta($sql);   
    }
 }
?>