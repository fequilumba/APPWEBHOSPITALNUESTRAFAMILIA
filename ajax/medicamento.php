<?php
    require_once "../modelos/Medicamento.php";
    $medicamento = new Medicamento();
    $idmedicamento = isset($_POST["idmedicamento"])? limpiarCadena($_POST["idmedicamento"]):""; 
    $nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $descripcion= isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

    switch ($_GET["op"]) {
        /*Operaciones de medicamento*/
        case 'guardaryeditar':
                if (empty($idmedicamento)) {
                    $rspta=$medicamento->insertar($nombre,$descripcion);
                    echo $rspta ? "Medicamento registrado" : "No se pudo registrar el Medicamento";
                    
                }else{
                    $rspta=$medicamento->editar($idmedicamento, $nombre,$descripcion);
                    echo $rspta ? "Medicamento actualizado" : "No se pudo actualizar el Medicamento";                
                }
            break;
        case 'mostrar':
                $rspta=$medicamento->mostrar($idmedicamento);
                echo json_encode($rspta);
            break;
        case 'listar':
            $rspta=$medicamento->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=> ($reg->estado) ? 
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idmedicamento.')"><li class="fa fa-pencil-alt"></li></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idmedicamento.')"><li class="fa fa-times"></li></button>'
                    :
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idmedicamento.')"><li class="fa fa-pencil-alt"></li></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idmedicamento.')"><li class="fa fa-check"></li></button>'
                    ,
                    "1"=>$reg->nombre,
                    "2"=>$reg->descripcion,
                    "3"=>$reg->estado?
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
            /*case 'eliminarExamenImagen':
                $rspta=$examenimagen->eliminarExamenImagen($idtipo_examen);
                echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
            break;*/
            case 'desactivar':
                $rspta=$medicamento->desactivar($idmedicamento);
                echo $rspta ? "Medicamento desactivado" : "No se pudo desactivar el Medicamento";
    
                break;
            case 'activar':
                $rspta=$medicamento->activar($idmedicamento);
                echo $rspta ? "Medicamento activado" : "No se pudo activar Medicamento";
    
                break;
    }

?>