<?php
    require_once "../modelos/Receta.php";
    $receta = new Receta();

    $idreceta = isset($_POST["idreceta"])? limpiarCadena($_POST["idreceta"]):"";
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):"";
    $observaciones = isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
    $medicamentos= isset($_POST["medicamentos"])? limpiarCadena($_POST["medicamentos"]):"";
    $especialidad = isset($_POST["especialidad"])? limpiarCadena($_POST["especialidad"]):""; 
    $paciente= isset($_POST["paciente"])? limpiarCadena($_POST["paciente"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $hora_cita= isset($_POST["hora_cita"])? limpiarCadena($_POST["hora_cita"]):"";
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idreceta)) {
                $rspta=$receta->insertar($especialidad_idespecialidad,$persona_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita registrada" : "La cita no se pudo registrar";
                

            }else{
                $rspta=$receta->editar($idreceta,$especialidad_idespecialidad,$persona_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita actualizada" : "La cita no se pudo actualizar";
                                
            }
            break;
        case 'mostrar':
                    $rspta=$receta->mostrar($idcita_medica);
                    echo json_encode($rspta);
                break;
        /*case 'eliminar':
                    $rspta=$receta->eliminarCita($idreceta);
                     
                    //echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;*/
        case 'listar':
            $rspta=$receta->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=> '<button class="btn btn-success" onclick="guardaryeditar('.$reg->idcita_medica.')"><li class="fa fa-plus-circle"></li> Receta</button>'.
                            ' <button class="btn btn-warning" onclick="mostrar('.$reg->idcita_medica.')"><li class="fa fa-eye"></li> </button>'.
                            ' <button class="btn btn-warning" onclick="imprimir('.$reg->idcita_medica.')"><li class="fa fa-print"></li> </button>',
                        "1"=>$reg->especialidad,
                        "2"=>$reg->paciente,
                        "3"=>$reg->fecha_cita,
                        "4"=>$reg->hora_cita,
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data);    
                echo json_encode($results);   
            break;
        case 'selectPaciente':
            require_once "../modelos/Paciente.php";
                $paciente = new Paciente();
                $rspta = $paciente->selectPaciente();
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
    }

?>