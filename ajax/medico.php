<?php
    require_once "../modelos/Medico.php";
    $medico = new Medico();

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
    $estado= isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
    $idhorario= isset($_POST["idhorario"])? limpiarCadena($_POST["idhorario"]):"";
    $hora_inicio= isset($_POST["hora_inicio"])? limpiarCadena($_POST["hora_inicio"]):"";
    $hora_fin= isset($_POST["hora_fin"])? limpiarCadena($_POST["hora_fin"]):"";

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idpersona)) {
                $rspta=$medico->insertar($especialidad_idespecialidad,$cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero);
                require_once "../modelos/Horario.php";
                $horario = new Horario();
                $rspta2 = $horario->insertarHorario($especialidad_idespecialidad,$hora_inicio,$hora_fin);
                echo $rspta? "Médico registrado" : "Médico no se pudo registrar";
                

            }else{
                $rspta=$medico->editar($idpersona, $especialidad_idespecialidad,$cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero);
                require_once "../modelos/Horario.php";
                $horario = new Horario();
                $rspta2 = $horario->editarHorario($idhorario,$especialidad_idespecialidad,$hora_inicio,$hora_fin);
                
                echo $rspta? "Médico actualizado" : "Médico no se pudo actualizar";
                                
            }
            break;
        case 'desactivar':
                $rspta=$medico->desactivar($idpersona);
                echo $rspta ? "Médico desactivado" : "No se pudo desactivar al Médico";
    
                break;
        case 'activar':
                $rspta=$medico->activar($idpersona);
                echo $rspta ? "Médico activado" : "No se pudo activar al Médico";
    
                break;
        case 'mostrar':
                    $rspta=$medico->mostrar($idpersona);
                    echo json_encode($rspta);
                break;
        case 'listar':
            $rspta=$medico->listar();
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
                        "1"=>$reg->nombre,
                        "2"=>$reg->cedula,
                        "3"=>$reg->nombres,
                        "4"=>$reg->apellidos,
                        "5"=>$reg->email,
                        "6"=>$reg->telefono,
                        "7"=>$reg->direccion,
                        "8"=>$reg->ciudad_residencia,
                        "9"=>$reg->fecha_nacimiento,
                        "10"=>$reg->genero,
                        "11"=>$reg->estado ?
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
        case 'selectEspecialidad':
                require_once "../modelos/Especialidad.php";
                $especialidad = new Especialidad();
                $rspta = $especialidad->selectEspecialidad();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idespecialidad.'>'
                            .$reg->nombre.
                          '</option>';
                }
            break;
    }

?>