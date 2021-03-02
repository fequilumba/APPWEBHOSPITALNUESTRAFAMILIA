<?php
/*llamar desde js-Calendario con AJAX a calendario y de ajax/calendario llamar al modelo po funcioin y con una
lista de arreglos (Array)*/
session_start();
    require_once "../modelos/Cita.php";
    $cita = new Cita();
    $idasociado=$_SESSION['idusuario'];
    $idasociado2=$_SESSION['idpersona'];
    $rolusuario=$_SESSION['rol_idrol'];
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $personaPaciente_idpersona= isset($_POST["personaPaciente_idpersona"])? limpiarCadena($_POST["personaPaciente_idpersona"]):"";
    $personaMedico_idpersona= isset($_POST["personaMedico_idpersona"])? limpiarCadena($_POST["personaMedico_idpersona"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $motivo_consulta= isset($_POST["motivo_consulta"])? limpiarCadena($_POST["motivo_consulta"]):"";
    $horario_idhorario = isset($_POST["horario_idhorario"])? limpiarCadena($_POST["horario_idhorario"]):""; 
    $estado_idestado= isset($_POST["estado_idestado"])? limpiarCadena($_POST["estado_idestado"]):"";
    
    switch ($_GET["op"]) {
        case 'guardarCita':
            if (empty($idcita_medica)) {
                $clavemedico= $personaMedico_idpersona."-".$fecha_cita."-".$horario_idhorario;
                $clavepaciente= $personaPaciente_idpersona."-".$fecha_cita."-".$horario_idhorario;
                $clavepacientemedico=$personaPaciente_idpersona."-".$personaMedico_idpersona."-".$fecha_cita."-".$horario_idhorario;
                $rspta=$cita->insertarCita($especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                                            $fecha_cita, $motivo_consulta, $horario_idhorario,
                                            $clavemedico,$clavepaciente,$clavepacientemedico);
                echo $rspta? "true" : "false";
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
            if ($rolusuario==1) {
                $rspta=$cita->listarCitas();
                $data = Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]= array(
                        "id"=>$reg->idcita_medica,
                        "title"=> 'No Disponible-'.$reg->especialidad.'',
                        "start"=>$reg->start,
                        //"color"=> 'red', 
                        "backgroundColor"=>"rgb(236, 112, 99)"
                    );
                } 
            }else {
                $rspta=$cita->listarCitasAsociadas($idasociado);
                $data = Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]= array(
                        "id"=>$reg->idcita_medica,
                        "title"=> $reg->especialidad.'-'.$reg->title.'',
                        "start"=>$reg->start,
                        //"color"=> 'red', 
                        "backgroundColor"=>"rgb(236, 112, 99)"
                    );
                } 
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
                    $rspta = $paciente->selectPaciente($idasociado2);
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