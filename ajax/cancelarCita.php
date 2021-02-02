<?php
    require_once "../modelos/Cancelarcita.php";
    $cancelarcita = new Cancelarcita();
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 

    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
                if (empty($idespecialidad)) {
                    $rspta=$especialidad->insertar($nombre);
                    echo $rspta ? "Especialidad registrada" : "No se pudo registrar la especialidad";
                    
                }else{
                    $rspta=$especialidad->editar($idespecialidad, $nombre);
                    echo $rspta ? "Especialidad actualizada" : "No se pudo actualizar la especialidad";                
                }
            break;
        case 'listar':
            $rspta=$cancelarcita->listarCitaCancelar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=>' <button class="btn btn-danger" onclick="eliminarCita('.$reg->idcita_medica.')"><li class="fa fa-close"></li> Cancelar</button>',
                        "1"=>$reg->especialidad,
                        "2"=>$reg->paciente,
                        "3"=>$reg->medico,
                        "4"=>$reg->telefono,
                        "5"=>$reg->fecha_cita,
                        "6"=>$reg->hora_cita,
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data);    
                echo json_encode($results);    
            break;
            
        case 'eliminar':
            $rspta=$cancelarcita->eliminarCita($idcita_medica);
            echo $rspta? "Cita eliminada" : "No se pudo eliminar la cita";
            break;
    }

?>