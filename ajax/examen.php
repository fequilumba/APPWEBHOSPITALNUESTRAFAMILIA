<?php
    require_once "../modelos/Examen.php";
    $examenimagen = new Examen();
    $idtipo_examen = isset($_POST["idtipo_examen"])? limpiarCadena($_POST["idtipo_examen"]):""; 
    $nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    switch ($_GET["op"]) {
        /*examenes de imagen */
        case 'guardaryeditarExamenImagen':
                if (empty($idtipo_examen)) {
                    $rspta=$examenimagen->insertarExamenImagen($nombre);
                    echo $rspta ? "Examen registrado" : "No se pudo registrar el examen";
                    
                }else{
                    $rspta=$examenimagen->editarExamenImagen($idtipo_examen, $nombre);
                    echo $rspta ? "Examen actualizado" : "No se pudo actualizar el examen";                
                }
            break;
        case 'mostrarExamenImagen':
                $rspta=$examenimagen->mostrarExamenImagen($idtipo_examen);
                echo json_encode($rspta);
            break;
        case 'listarExamenImagen':
            $rspta=$examenimagen->listarExamenImagen();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idtipo_examen.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="eliminar('.$reg->idtipo_examen.')"><li class="fa fa-close"></li></button>',
                        
                    "1"=>$reg->nombre
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data);    
                echo json_encode($results);   
            break;
            case 'eliminarExamenImagen':
                $rspta=$examenimagen->eliminarExamenImagen($idtipo_examen);
                echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
            break;


            /*examenes de sangre */
            case 'guardaryeditarExamenSangre':
                if (empty($idtipo_examen)) {
                    $rspta=$examenimagen->insertarExamenSangre($nombre);
                    echo $rspta ? "Examen registrado" : "No se pudo registrar el examen";
                    
                }else{
                    $rspta=$examenimagen->editarExamenSangre($idtipo_examen, $nombre);
                    echo $rspta ? "Examen actualizado" : "No se pudo actualizar el examen";                
                }
            break;
        case 'mostrarExamenSangre':
                $rspta=$examenimagen->mostrarExamenSangre($idtipo_examen);
                echo json_encode($rspta);
            break;
        case 'listarExamenSangre':
            $rspta=$examenimagen->listarExamenSangre();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idtipo_examen.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="eliminar('.$reg->idtipo_examen.')"><li class="fa fa-close"></li></button>',
                        
                    "1"=>$reg->nombre
                );
            }
            $results = array(
                "sEcho"=>1,//informacion para el datatable
                "iTotalRecords"=>count($data),//enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
                "aaData"=>$data);    
                echo json_encode($results);   
            break;
            case 'eliminarExamenSangre':
                $rspta=$examenimagen->eliminarExamenSangre($idtipo_examen);
                echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
            break;
    }

?>