<?php
    session_start();
    require_once "../modelos/Receta.php";
    $receta = new Receta();
    $idusuario=$_SESSION['idpersona'];
    $idreceta = isset($_POST["idreceta"])? limpiarCadena($_POST["idreceta"]):"";
    $seleccita = isset($_POST["seleccita"])? limpiarCadena($_POST["seleccita"]):"";
    $observaciones = isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
    $medicamentos= isset($_POST["medicamentos"])? limpiarCadena($_POST["medicamentos"]):"";
    /*$especialidad = isset($_POST["especialidad"])? limpiarCadena($_POST["especialidad"]):""; 
    $paciente= isset($_POST["paciente"])? limpiarCadena($_POST["paciente"]):"";
    $fecha_cita= isset($_POST["fecha_cita"])? limpiarCadena($_POST["fecha_cita"]):"";
    $hora_cita= isset($_POST["hora_cita"])? limpiarCadena($_POST["hora_cita"]):"";*/
    
    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idreceta)) {
                $rspta=$receta->insertar($observaciones,$medicamentos,$seleccita);
                echo $rspta? "Receta registrada" : "La Receta no se pudo registrar";
                
            }else{
                $rspta=$receta->editar($idreceta,$observaciones,$medicamentos);
                echo $rspta? "Receta actualizada" : "La Receta no se pudo actualizar";
                                
            }
            break;
        case 'ver':
                    $rspta=$receta->ver($idreceta);
                    echo json_encode($rspta);
                break;
        case 'mostrar':
                $rspta=$receta->mostrar($idreceta);
                echo json_encode($rspta);
            break;
        /*case 'eliminar':
                    $rspta=$receta->eliminarCita($idreceta);
                     
                    //echo $rspta ? "Cita eliminada" : "No se pudo eliminar la cita";
                break;*/
        case 'listar':
            $rspta=$receta->listar($idusuario);
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                        "0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->idreceta.')"><li class="fa fa-pencil"></li> </button>'.
                            ' <button class="btn btn-primary" onclick="ver('.$reg->idreceta.')"><li class="fa fa-eye"></li> </button>'/*.
                            ' <button class="btn btn-dark" onclick="imprimir('.$reg->idreceta.')"><li class="fa fa-print"></li> </button>'*/,
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
        case 'selectCita':
                $rspta = $receta->selectCita($idusuario);
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idcita_medica.'>'
                            .$reg->nombres.
                          '</option>';
                }
            break;
    }

?>