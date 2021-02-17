<?php
    require_once "../modelos/Especialidad.php";
    $especialidad = new Especialidad();
    $idespecialidad = isset($_POST["idespecialidad"])? limpiarCadena($_POST["idespecialidad"]):""; 
    $nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $estado= isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
    
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
        case 'desactivar':
            $rspta=$especialidad->desactivar($idespecialidad);
            echo $rspta ? "Especialidad desactivada" : "No se pudo desactivar la especialidad";

            break;
        case 'activar':
            $rspta=$especialidad->activar($idespecialidad);
            echo $rspta ? "Especialidad activada" : "No se pudo activar la especialidad";

            break;
        case 'mostrar':
                $rspta=$especialidad->mostrar($idespecialidad);
                echo json_encode($rspta);
            break;
        case 'listar':
            $rspta=$especialidad->listar();
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
    }

?>