<?php
/*llamar desde js-Calendario con AJAX a calendario y de ajax/calendario llamar al modelo po funcioin y con una
lista de arreglos (Array)*/
session_start();
    require_once "../modelos/Cita.php";
    $cita = new Cita();
    $idasociado=$_SESSION['idusuario'];
    $rolusuario=$_SESSION['rol_idrol'];
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
        case 'guardarCita':
            if (empty($idcita_medica)) {
                $rspta=$cita->insertarCita($especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                $fecha_cita, $motivo_consulta, $horario_idhorario);
                echo $rspta? "Cita registrada" : "La cita no se pudo registrar";
            }else{
                $rspta=$cita->editarCita($idcita_medica,$especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                $fecha_cita, $motivo_consulta, $horario_idhorario);
                echo $rspta? "Cita actualizada" : "La cita no se pudo actualizar";                        
                }
                break;
        case 'mostrar':
                    $rspta=$cita->mostrar($idcita_medica);
                    echo json_encode($rspta);
                break;
        case 'eliminar':
                    $rspta=$cita->eliminarCita($idcita_medica);
                     
                    //echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;
        case 'listarCitas':
                $rspta=$cita->listarCitas();
                $data = Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]= array(
                        "id"=>$reg->idcita_medica,
                        "title"=> $reg->title,
                        "start"=>$reg->start
                    );
                }  
                echo json_encode($data);   
                break;
        case 'selectPaciente':
            require_once "../modelos/Paciente.php";
                $paciente = new Paciente();

                if ($rolusuario==1) {
                    $rspta = $paciente->selectTodosPacientes();
                    //echo '<option value=0>Seleccionar</option>';
                    while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idpersona.'>'
                            .$reg->nombres.
                          '</option>';
                    }
                }else {
                    $rspta = $paciente->selectPaciente($idasociado);
                    //echo '<option value=0>Seleccionar</option>';
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
                echo '<option value=0>Seleccionar</option>';
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
                echo '<option value=0>Seleccionar</option>';
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idhorario.'>'
                            .$reg->hora.
                          '</option>';
                }
            break;
    }

?>