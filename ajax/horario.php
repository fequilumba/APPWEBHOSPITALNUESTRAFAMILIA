<?php
    require_once "../modelos/Horario.php";
    $horario = new Horario();
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):"";     
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $personaMedico_idpersona= isset($_POST["personaMedico_idpersona"])? limpiarCadena($_POST["personaMedico_idpersona"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):""; 
    $estado_idestado= isset($_POST["estado_idestado"])? limpiarCadena($_POST["estado_idestado"]):"";

    switch ($_GET["op"]) {
        case 'guardaryeditar':
                if (empty($idcita_medica)) {
                    $rspta=$horario->insertar($especialidad_idespecialidad,$personaMedico_idpersona, $fecha_cita,$_POST['horarioc']);
                    echo $rspta ? "Horarios registrados" : "No se pudo registrar los horarios";
                    
                }else{
                    
                    echo "La disponibilidad no se puede editar";                
                }
            break;
        case 'listar':
            $rspta=$horario->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>'<button class="btn btn-danger" onclick="alerEliminar('.$reg->idcita_medica.')"><li class="fa fa-times"></li> Eliminar</button>',
                    "1"=>$reg->nombre,
                    "2"=>$reg->medico,
                    "3"=>$reg->fecha_cita, 
                    "4"=>$reg->hora,  
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
            echo '<option value=0>Seleccionar</option>';
            while ($reg = $rspta->fetch_object()) {
                echo '<option value='.$reg->idespecialidad.'>'
                            .$reg->nombre.'</option>';
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
        case 'selectHorario':
            
            $rspta = $horario->selectHorario();
            
            while ($reg = $rspta->fetch_object()) 
            {
                echo '<li> <input type="checkbox" name="horarioc[]" value="'.$reg->idhorario.'"> '.$reg->hora.'</li>';
            }
            break;
        case 'eliminar':
            $rspta=$horario->eliminarHora($idcita_medica);
            //echo $rspta? "Cita eliminada" : "No se pudo eliminar la cita";
            break;
    }

?>