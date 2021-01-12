<?php
 require "../config/Conexion.php";
 class Usuario{
     public function __construct(){
        
     }
     //Metodo para insertar usuarioss
     public function insertar($username,$contrasenia,$email,$imagen,$permisos){
        $sql= "INSERT INTO `usuario` (`username`, `contrasenia`,`email`,`imagen`,`estado`) 
        VALUES ('$username','$contrasenia','$email','$imagen','1')";
        //return ejecutarConsulta($sql);
        $idusuarionew = ejecutarConsulta_retornarID($sql);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos)) { 
            //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
            $sql_detalle = "INSERT INTO `usuario_permiso` (`usuario_idusuario`, `permiso_idpermiso`) 
                            VALUES('$idusuarionew','$permisos[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos +1;
        }
        return $sw;
    }
     //metodo para editar o actualizar especialidad
     public function editar($idusuario,$username,$contrasenia,$email,$imagen,$permisos){
        $sql= " UPDATE `usuario` SET `username` = '$username',`contrasenia` = '$contrasenia',
        `email` = '$email',`imagen` = '$imagen' WHERE `usuario`.`idusuario` = '$idusuario'";
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
        $sql= "SELECT u.`idusuario`, u.`username`, u.`email`, u.`imagen`, u.`estado` FROM `usuario` u";
        
        return ejecutarConsulta($sql);
    }
    public function listaMarcados($idusuario)
    {
        $sql= "SELECT * FROM `usuario_permiso` WHERE `usuario_idusuario`='$idusuario' ";        
        return ejecutarConsulta($sql);
    }

 }
?>