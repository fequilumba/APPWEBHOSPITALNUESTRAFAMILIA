<?php
    require_once "../modelos/Receta.php";
    $cita = new Receta();

    $idreceta = isset($_POST["idreceta"])? limpiarCadena($_POST["idreceta"]):"";
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $persona_idpersona= isset($_POST["persona_idpersona"])? limpiarCadena($_POST["persona_idpersona"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $observaciones = isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
    $medicamentos= isset($_POST["medicamentos"])? limpiarCadena($_POST["medicamentos"]):"";
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idcita_medica)) {
                $rspta=$cita->insertar($especialidad_idespecialidad,$persona_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita registrada" : "La cita no se pudo registrar";
                

            }else{
                $rspta=$cita->editar($idcita_medica,$especialidad_idespecialidad,$persona_idpersona, 
                $fecha_cita, $diagnostico, $sintomas, $motivo_consulta, $horario_idhorario,$estado_idestado);
                echo $rspta? "Cita actualizada" : "La cita no se pudo actualizar";
                                
            }
            break;
        /*case 'guardarCita':
                if (empty($idcita_medica)) {
                    $rspta=$cita->insertarCita($especialidad_idespecialidad,$persona_idpersona, 
                    $fecha_cita, $motivo_consulta, $horario_idhorario);
                    
                    
    
                }else{
                    $rspta=$cita->editarCita($idcita_medica,$especialidad_idespecialidad,$persona_idpersona, 
                    $fecha_cita, $motivo_consulta, $horario_idhorario);
                    echo $rspta? "Cita actualizada" : "La cita no se pudo actualizar";
                                    
                }
                break;*/
        case 'mostrar':
                    $rspta=$cita->mostrar($idcita_medica);
                    echo json_encode($rspta);
                break;
        /*case 'eliminar':
                    $rspta=$cita->eliminarCita($idcita_medica);
                     
                    //echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;*/
        case 'listar':
            $rspta=$cita->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=> '<button class="btn btn-info" onclick="mostrar('.$reg->idcita_medica.')"><li class="fa fa-file-o"></li></button>'.
                            ' <button class="btn btn-warning" onclick="receta('.$reg->idcita_medica.')"><li class="fa fa-file-o"></li> Receta</button>',
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
        /*case 'listarCitas':
                $rspta=$cita->listarCitas();
                $data = Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]= array(
                        "id"=>'<button onclick="mostrarCita('.$reg->idcita_medica.')"></button>',
                        "title"=> $reg->title,
                        "start"=>$reg->start
                    );
                }  
                echo json_encode($data);   
                break;
        case 'mostrarCita':
                    $rspta=$cita->mostrarCita($idcita_medica);
                    echo json_encode($rspta);
                break;*/
       /* case 'selectEstado':
                require_once "../modelos/Estado.php";
                $estado = new Estado();
                $rspta = $estado->selectEstado();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idestado.'>'
                            .$reg->nombre.
                          '</option>';
                }
            break;*/
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
        /*case 'selectHorario':
                require_once "../modelos/Horario.php";
                $horario = new Horario();
                $rspta = $horario->selectHorario();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idhorario.'>'
                            .$reg->hora.
                          '</option>';
                }
            break;*/
    }

?>