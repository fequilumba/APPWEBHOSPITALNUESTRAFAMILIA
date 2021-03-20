<?php
    require_once "../modelos/Agendar.php";
    $agendar = new Agendar();
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $personaPaciente_idpersona= isset($_POST["personaPaciente_idpersona"])? limpiarCadena($_POST["personaPaciente_idpersona"]):"";
    $personaMedico_idpersona= isset($_POST["personaMedico_idpersona"])? limpiarCadena($_POST["personaMedico_idpersona"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $motivo_consulta= isset($_POST["motivo_consulta"])? limpiarCadena($_POST["motivo_consulta"]):"";
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
                if (empty($idcita_medica)) {
                    echo "Error al resgistrar la cita verifique todos los datos";
                    
                }else{
                /*$clavepaciente= $personaPaciente_idpersona."-".$fecha_cita."-".$horario_idhorario;
                $clavepacientemedico=$personaPaciente_idpersona."-".$personaMedico_idpersona."-".$fecha_cita."-".$horario_idhorario;*/
                    $rspta=$agendar->editar($idcita_medica,$especialidad_idespecialidad,$personaPaciente_idpersona,$personaMedico_idpersona, 
                    $fecha_cita, $motivo_consulta);
                    echo $rspta ? "Cita registrada" : "No se pudo registrar la cita";                
                }
            break;
        case 'listar':
            $rspta=$agendar->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=> ($reg->estado) ? 
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idespecialidad.')"><li class="fa fa-pencil-alt"></li></button>'.
                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idespecialidad.')"><li class="fa fa-times"></li></button>'
                        :
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idespecialidad.')"><li class="fa fa-pencil-alt"></li></button>'.
                        ' <button class="btn btn-primary" onclick="activar('.$reg->idespecialidad.')"><li class="fa fa-check"></li></button>'
                        ,
                    "1"=>$reg->nombre,
                    "2"=>$reg->estado ?
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
        case 'selectPaciente':
            require_once "../modelos/Paciente.php";
                $paciente = new Paciente();
                    $rspta = $paciente->selectTodosPacientes();
                    echo '<option value=>Seleccionar</option>';
                    while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idpersona.'>'
                            .$reg->nombres.
                          '</option>';
                    }
                
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
                    echo '<option value=>Seleccionar</option>';
                    while ($reg = $rspta->fetch_object()) {
                        echo '<option value='.$reg->idespecialidad.'>'
                                .$reg->nombre.
                              '</option>';
                    }
                break;
        case 'selecthora':
            $especialidad=$_POST['especialidad_idespecialidad'];
            $personaMedico=$_POST['personaMedico_idpersona'];
            $fecha=$_POST['fecha_cita'];
                    $rspta = $agendar->selecthora($especialidad,$personaMedico,$fecha);
                    //echo '<option value=>Seleccionar</option>';
                    while ($reg = $rspta->fetch_object()) {
                        echo '<option value='.$reg->idcita_medica.'>'
                                .$reg->fecha.
                              '</option>';
                    }
                break;
    }

?>