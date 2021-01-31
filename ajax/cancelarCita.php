<?php
/*llamar desde js-Calendario con AJAX a calendario y de ajax/calendario llamar al modelo po funcioin y con una
lista de arreglos (Array)*/
    require_once "../modelos/Cita.php";
    $cita = new Cita();
    $idcita_medica = isset($_POST["idcita_medica"])? limpiarCadena($_POST["idcita_medica"]):""; 
    switch ($_GET["op"]) {
        
        case 'eliminar':
                    $rspta=$cita->eliminarCita($idcita_medica);
                     
                    echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;
        case 'listar':
            $rspta=$cita->listarCitaCancelar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=>' <button class="btn btn-danger" onclick="eliminar('.$reg->idcita_medica.')"><li class="fa fa-close"></li> Cancelar</button>',
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
        
    }

?>