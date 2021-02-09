<?php
/*llamar desde js-Calendario con AJAX a calendario y de ajax/calendario llamar al modelo po funcioin y con una
lista de arreglos (Array)*/
session_start();
    require_once "../modelos/Cita.php";
    $cita = new Cita();
    $idusuario=$_SESSION['idpersona'];
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    //$persona_idpersona= isset($_POST["persona_idpersona"])? limpiarCadena($_POST["persona_idpersona"]):"";
    $personaPaciente_idpersona= isset($_POST["personaPaciente_idpersona"])? limpiarCadena($_POST["personaPaciente_idpersona"]):"";
    $personaMedico_idpersona= isset($_POST["personaMedico_idpersona"])? limpiarCadena($_POST["personaMedico_idpersona"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $hora_cita= isset($_POST["hora_cita"])? limpiarCadena($_POST["hora_cita"]):"";
    $diagnostico = isset($_POST["diagnostico"])? limpiarCadena($_POST["diagnostico"]):"";
    $sintomas= isset($_POST["sintomas"])? limpiarCadena($_POST["sintomas"]):"";
    $motivo_consulta= isset($_POST["motivo_consulta"])? limpiarCadena($_POST["motivo_consulta"]):"";
    $horario_idhorario = isset($_POST["horario_idhorario"])? limpiarCadena($_POST["horario_idhorario"]):""; 
    $estado_idestado= isset($_POST["estado_idestado"])? limpiarCadena($_POST["estado_idestado"]):"";
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idcita_medica)) {
                $rspta=$cita->insertar($especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita registrada" : "La cita no se pudo registrar";
                

            }else{
                $rspta=$cita->editar($idcita_medica,$especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita actualizada" : "La cita no se pudo actualizar";
                                
            }
            break;
        case 'mostrar':
                    $rspta=$cita->mostrar($idcita_medica);
                    echo json_encode($rspta);
                break;
        /*case 'eliminar':
                    $rspta=$cita->eliminarCita($idcita_medica);
                     
                    echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;*/
        case 'listar':
            $rspta=$cita->listar($idusuario);
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->idcita_medica.')"><li class="fa fa-pencil"></li></button>',
                        "1"=>$reg->especialidad,
                        "2"=>$reg->nombre,
                        "3"=>$reg->telefono,
                        "4"=>$reg->fecha_cita,
                        "5"=>$reg->hora_cita,
                        "6"=>$reg->estado
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data);    
                echo json_encode($results);   
            break;
        case 'selectEstado':
                require_once "../modelos/Estado.php";
                $estado = new Estado();
                $rspta = $estado->selectEstado();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idestado.'>'
                            .$reg->nombre.
                          '</option>';
                }
            break;
        case 'selectPaciente':
            require_once "../modelos/Paciente.php";
            $paciente = new Paciente();
            if ($idusuario==1) {
                $rspta = $paciente->selectTodosPacientes();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idpersona.'>'
                            .$reg->nombres.
                          '</option>';
                }
            }else {
                
                $rspta = $paciente->selectPacienteM();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idpersona.'>'
                            .$reg->nombres.
                          '</option>';
                }
            }
                
            break;
        case 'selectMedico':
            $idespecialidad = $_POST['idespecialidad'];
                require_once "../modelos/Medico.php";
                    $medico = new Medico();
                    $rspta = $medico->selectMedico($idespecialidad);
                    while ($reg = $rspta->fetch_object()) {
                        echo '<option value='.$reg->idpersona.'>'
                                .$reg->nombres.
                              '</option>';
                    }
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
        case 'selectHorario':
                require_once "../modelos/Horario.php";
                $horario = new Horario();
                $rspta = $horario->selectHorario();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idhorario.'>'
                            .$reg->hora.
                          '</option>';
                }
            break;
    }

?>