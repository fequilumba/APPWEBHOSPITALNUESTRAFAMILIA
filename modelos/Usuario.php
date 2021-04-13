<?php
// Incluímos inicialmente la conexión a la base de datos
 require "../config/Conexion.php";

    class Usuario{
        public function __construct(){
            
        }

        //Metodo para insertar Clientes desde el formulario de registro
        public function insertar($cedula,$contraseniahash){

            $sql= "INSERT INTO usuario (`login`, contrasenia) 
            VALUES ('$cedula','$contraseniahash')";
            return ejecutarConsulta_retornarID($sql);

        }
        
        //metodo para editar o actualizar un paciente 
        public function editar($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, $direccion, $ciudad_residencia, $fecha_nacimiento, $genero, $imagen){
            $pieces = explode(" ", $nombres); 
            $str="";

            foreach($pieces as $piece) { 
                $str.=$piece[0]; 
            }  
                                    
            $contrasenia= $cedula . $str;

            $sql= "UPDATE usuario SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', email='$email', 
                    telefono='$telefono', direccion='$direccion', ciudad_residencia='$ciudad_residencia', fecha_nacimiento='$fecha_nacimiento', 
                    genero='$genero',`login`='$cedula', contrasenia='$contrasenia', imagen='$imagen'
                    WHERE idusuario='$idpersona'";
            ejecutarConsulta($sql);

            //Eliminamos todos los permisos asignados para volverlos a registrar
            $sqldel="DELETE FROM usuario_permiso WHERE usuario_idusuario='$idusuario'";
            ejecutarConsulta($sqldel);

            $num_elementos=0;
            $sw=true;

            while ($num_elementos < count($permisos)) { 
                //insertamos cada uno de los permiso del usuario, cin wihle recorremo todos los permisos asigandos
                $sql_detalle = "INSERT INTO usuario_permiso (usuario_idusuario, permiso_idpermiso) 
                            VALUES('$idusuario','$permisos[$num_elementos]')";
                            //enviamos la variable.. true si es de manera correcta
                ejecutarConsulta($sql_detalle) or $sw = false;
                $num_elementos=$num_elementos +1;
            }
            return $sw;
        }


        public function listaMarcados($rol_idrol) {
            $sql= "SELECT * FROM rol_has_permiso WHERE rol_idrol='$rol_idrol' ";        
            return ejecutarConsulta($sql);
        }
        
        public function verificar($login,$clavehash,$rol_idrol) {
            $sql= "SELECT u.idusuario, p.nombres, p.imagen, u.`login`, ur.rol_idrol, p.idpersona, p.apellidos
                    FROM usuario u 
                    INNER JOIN usuario_has_rol ur ON u.idusuario= ur.usuario_idusuario
                    INNER JOIN persona p ON p.usuario_idusuario= u.idusuario
                    WHERE u.`login`='$login' AND u.contrasenia='$clavehash' AND p.estado=1 AND ur.rol_idrol='$rol_idrol'";        
            return ejecutarConsulta($sql);
        }

        public function selectRol()
        {
            $sql= "SELECT * FROM rol";        
            return ejecutarConsulta($sql);   
        }
    }
?>