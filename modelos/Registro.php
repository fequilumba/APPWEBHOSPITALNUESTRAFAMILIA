<?php
 // INCLUIMOS INICIALMENTE LA CONEXIÓN A LA BASE DE DATOS
 require "../config/Conexion.php";
 
    Class Registro{

        //IMPLEMENTAMOS EL CONSTRUCTOR
        public function __construct(){
        
        }
        /* MÉTODO QUE REGISTRA A PERSONA CON ROL CLIENTE Y PACIENTE CON SU MISMO ID ASOCIADO 
            DESDE EL FORMULARIO DE REGISTRO EN LÍNEA
            El método clienteRegistro luego del SQL envía los resultados a mi modelo cliente.php de la carpeta ajax
        */
        public function clienteRegistro ($cedula, $nombres, $apellidos, $email, $telefono, $direccion, $ciudad_residencia, $fecha_nacimiento, $genero, $imagen, $iduser) {                 
            $sqlp= "INSERT INTO persona (cedula, nombres, apellidos, email, telefono, direccion, ciudad_residencia, fecha_nacimiento, genero, estado, idasociado, imagen, usuario_idusuario) 
            VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telefono', '$direccion', '$ciudad_residencia', '$fecha_nacimiento', '$genero', 1, 0, '$imagen', '$iduser')";

            $idpersonanew = ejecutarConsulta_retornarID($sqlp);
            $idasociado= "UPDATE persona SET idasociado = '$idpersonanew' WHERE idpersona = '$idpersonanew'";
            ejecutarConsulta($idasociado);

            //REGISTRA EN LA TABLA usuario_has_rol EL iduser Y ROL cliente
            $sql_rol1 = "INSERT INTO usuario_has_rol (usuario_idusuario, rol_idrol) 
                VALUES ('$iduser','3')";
            ejecutarConsulta($sql_rol1);

            //REGISTRA EN LA TABLA usuario_has_rol EL iduser Y ROL paciente
            $sql_rol2 = "INSERT INTO usuario_has_rol (usuario_idusuario, rol_idrol) 
                VALUES ('$iduser','4')";
            ejecutarConsulta($sql_rol2);
            
            //REGISTRA EN LA TABLA persona_has_rol EL idpersonanew Y ROL cliente 
            $sql_rol3 = "INSERT INTO persona_has_rol (persona_idpersona, rol_idrol) 
                VALUES ('$idpersonanew','3')";
            ejecutarConsulta($sql_rol3);

            //REGISTRA EN LA TABLA persona_has_rol EL idpersonanew Y ROL paciente
            $sql_rol4 = "INSERT INTO persona_has_rol (persona_idpersona, rol_idrol) 
                VALUES ('$idpersonanew','4')";
            return ejecutarConsulta($sql_rol4);
        }

    } //END CLASS Registro
?>