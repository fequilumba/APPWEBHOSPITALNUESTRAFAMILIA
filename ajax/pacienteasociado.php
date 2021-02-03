<?php
session_start();
    require_once "../modelos/Pacienteasociado.php";
    $paciente = new Pacienteasociado();
    //$idasociado=$_SESSION['idusuario'];
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
    $cliente= isset($_POST["cliente"])? limpiarCadena($_POST["cliente"]):"";

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idpersona)) {
                $rspta=$paciente->insertar($cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero,$cliente);
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->insertarUPaciente($cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen);
                echo $rspta? "Paciente registrado" : "Paciente no se pudo registrar";
                

            }else{
                $rspta=$paciente->editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$cliente);
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->editarUsuario($idpersona,$cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen);
                echo $rspta? "Paciente actualizado" : "Paciente no se pudo actualizar";
                                
            }
            break;
        case 'desactivar':
                $rspta=$paciente->desactivar($idpersona);
                echo $rspta ? "Paciente desactivado" : "No se pudo desactivar al paciente";
    
                break;
        case 'activar':
                $rspta=$paciente->activar($idpersona);
                echo $rspta ? "Paciente activado" : "No se pudo activar al paciente";
    
                break;
        case 'mostrar':
                    $rspta=$paciente->mostrar($idpersona);
                    echo json_encode($rspta);
                break;
        case 'listar':
                $rspta=$paciente->listarTodosPacientes();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=> ($reg->estado) ? 
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><li class="fa fa-close"></li></button>'
                        :
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><li class="fa fa-check"></li></button>'
                        ,
                        "1"=>$reg->cedula,
                        "2"=>$reg->nombres,
                        "3"=>$reg->email,
                        "4"=>$reg->telefono,
                        "5"=>$reg->direccion,
                        "6"=>$reg->ciudad_residencia,
                        "7"=>$reg->fecha_nacimiento,
                        "8"=>$reg->genero,
                        "9"=>$reg->estado ?
                    '<span class="label bg-green">Activado</span>'
                    :      
                    '<span class="label bg-red">Desactivado</span>'
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data); 
            
               
                echo json_encode($results);   
            break;
        case 'selectCliente':
                $rspta = $paciente->selectCliente();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idpersona.'>'
                            .$reg->nombres.
                          '</option>';
                }
            break;
        
    }
    

?>