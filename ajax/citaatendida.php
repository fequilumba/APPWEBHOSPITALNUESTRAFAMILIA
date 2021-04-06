<?php
    session_start();
    require_once "../modelos/Citaatendida.php";
    $citaatendida = new Citaatendida();
    $idusuario=$_SESSION['idpersona'];
    $idtipo_examen= isset($_POST["idtipo_examen"])? limpiarCadena($_POST["idtipo_examen"]):"";
    $seleccita = isset($_POST["seleccita"])? limpiarCadena($_POST["seleccita"]):""; 
    $nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    
    
    switch ($_GET["op"]) {
        /*case 'guardaryeditar':
                if (empty($idtipo_examen)) {
                    $rspta=$examenmedico->insertar($seleccita,$nombre);
                    echo $rspta ? "Exámen registrado" : "No se pudo registrar los exámenes";
                    
                }else{
                    $rspta=$examenmedico->editar($idtipo_examen, $nombre);
                    echo $rspta ? "Exámen actualizado" : "No se pudo actualizar los exámenes";                
                }
            break;*/
        /*case 'desactivar':
            $rspta=$especialidad->desactivar($idespecialidad);
            echo $rspta ? "Especialidad desactivada" : "No se pudo desactivar la especialidad";

            break;
        case 'activar':
            $rspta=$especialidad->activar($idespecialidad);
            echo $rspta ? "Especialidad activada" : "No se pudo activar la especialidad";

            break;*/
        case 'mostrar':
            $rspta=$citaatendida->mostrar($idcita_medica);
            echo json_encode($rspta);
        break;
        case 'listar':
            $rspta=$citaatendida->listar($idusuario);
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>$reg->idcita_medica,
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
        /*case 'imagen':
            require_once "../modelos/Examen.php";
            $examen = new Examen();
            $rspta=$examen->listarExamenImagen();

            while ($reg = $rspta->fetch_object()) {
                echo '<li> <input type="checkbox" name "imagen[]" value="'.$reg->idtipo_examen.'">'.$reg->nombre.'</li>';
            }
            break;
        case 'sangre':
            require_once "../modelos/Examen.php";
            $examen = new Examen();
            $rspta=$examen->listarExamenSangre();
    
            while ($reg = $rspta->fetch_object()) {
                echo '<li> <input type="checkbox" name "sangre[]" value="'.$reg->idtipo_examen.'">'.$reg->nombre.'</li>';
            }
            break;*/
    }

?>