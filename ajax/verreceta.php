<?php
    session_start();
    require_once "../modelos/Verreceta.php";
    $verreceta = new Verreceta();
    $idusuario=$_SESSION['idusuario'];
    $idreceta = isset($_POST["idreceta"])? limpiarCadena($_POST["idreceta"]):""; 
    $especialidad= isset($_POST["especialidad"])? limpiarCadena($_POST["especialidad"]):"";
    $paciente= isset($_POST["paciente"])? limpiarCadena($_POST["paciente"]):"";
    $medico= isset($_POST["medico"])? limpiarCadena($_POST["medico"]):"";
    $observaciones= isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
    $medicamentos= isset($_POST["medicamentos"])? limpiarCadena($_POST["medicamentos"]):"";
       
    switch ($_GET["op"]) {
        case 'mostrar':
                $rspta=$verreceta->mostrar($idreceta);
                echo json_encode($rspta);
            break;
        case 'listar':
            $rspta=$verreceta->listar($idusuario);
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>'<button class="btn btn-primary" onclick="mostrar('.$reg->idreceta.')"><li class="fa fa-eye"></li></button>',
                    
                    "1"=>$reg->especialidad,
                    "2"=>$reg->paciente,
                    "3"=>$reg->medico,
                    "4"=>$reg->fecha_cita, 
                    "5"=>$reg->hora_cita,
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