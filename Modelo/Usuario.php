<?php
    include_once 'Conexion.php';
    class Usuario{
        var $objetos;
        public function __constructor(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }
        function login($usuario, $contrasenia){
            $sql="SELECT * FROM usuario, usuario_has_rol, rol  WHERE usuario.idusuario=usuario_has_rol.usuario_idusuario and rol.idrol=usuario_has_rol.rol_idrol and username='$usuario' and contrasenia='$contrasenia'";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':usuario'->$usuario,':contrasenia'->$contrasenia));
            $this->objetos->$query->fetch(); //todos los resultados de la consulta
            return $this->objetos;
        }
    }
?>