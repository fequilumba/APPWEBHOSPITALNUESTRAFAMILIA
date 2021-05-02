<?php
    require_once "../modelos/Persona.php";
    
    $persona = new Persona();

    // ESTRUCTURAS CONDICIONALES DE UNA SOLA LÍNEA
    $idpersona = isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $cedula= isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";
    $nombres= isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
    $apellidos= isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
    $email = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
    $telefono= isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $direccion= isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
    $ciudad_residencia= isset($_POST["ciudad_residencia"])? limpiarCadena($_POST["ciudad_residencia"]):"";
    $fecha_nacimiento= isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):""; 
    $genero= isset($_POST["genero"])? limpiarCadena($_POST["genero"]):"";
    $imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
    $estado= isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";


    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idpersona)) {
                $rspta = $persona->insertar($cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion, $ciudad_residencia, $fecha_nacimiento, $genero, $_POST['rol']);
                
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->insertar($cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero, $imagen);
                echo $rspta ? "Cliente registrado" : "Cliente no se pudo registrar";   

            } else {
                $rspta = $persona->editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,  $_POST['rol']);
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->editarUsuario($idpersona,$cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen);
                echo $rspta ? "Cliente actualizado" : "Cliente no se pudo actualizar";                    
            }
        break;

        /*case 'desactivar':
            $rspta = $persona->desactivar($idpersona);
            echo $rspta ? "Persona desactivada" : "No se pudo desactivar la persona";
        break;

        case 'activar':
            $rspta=$persona->activar($idpersona);
            echo $rspta ? "Persona activada" : "No se pudo activar la persona";
        break;*/

        case 'mostrar':
            $rspta=$persona->mostrar($idpersona);
            // CODIFICAR EL RESULTADO USANDO JSON
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta=$persona->listar();
            // DECLARAMOS UN ARRAY
            $data = Array();

            while ($reg = $rspta->fetch_object()) {
                $data[]= array(
                    "0"=> ($reg->estado)? 
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil-alt"></li></button>'.
                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><li class="fa fa-times"></li></button>':
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil-alt"></li></button>'.
                        ' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><li class="fa fa-check"></li></button>',
                    "1"=>$reg->cedula,
                    "2"=>$reg->nombres,
                    "3"=>$reg->apellidos,
                    "4"=>$reg->email,
                    "5"=>$reg->telefono,
                    "6"=>$reg->direccion,
                    "7"=>$reg->ciudad_residencia,
                    "8"=>$reg->fecha_nacimiento,
                    "9"=>$reg->genero,
                    "10"=>$reg->estado ?
                    '<span class="label bg-green">Activado</span>':      
                    '<span class="label bg-red">Desactivado</span>'
                );
            }

            $results = array(
                "sEcho"=>1, //INFORMACIÓN PARA EL DATATABLES
                "iTotalRecords"=>count($data), // ENVIAMOS EL TOTAL REGISTROS AL DATATABLE
                "iTotalDisplayRecords"=>count($data), //ENVIAMOS EL TOTAL REGISTROS A VISUALIZAR
                "aaData"=>$data);    
                echo json_encode($results);   
        break;
    }

?>