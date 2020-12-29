<?php
    require_once "../modelos/Persona.php";
    $persona = new Persona();

    $idpersona = isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):""; 
    $cedula= isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";
    $nombres= isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
    $apellidos= isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
    $email = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
    $telefono= isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $direccion= isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
    $ciudad= isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
    $fnacimiento= isset($_POST["fnacimiento"])? limpiarCadena($_POST["fnacimiento"]):""; 
    $genero= isset($_POST["genero"])? limpiarCadena($_POST["genero"]):"";

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idpersona)) {
                //$fnacimiento1 = strtotime($fnacimiento);
                //$fnacimiento1 = date('yyyy-MM-dd',$fnacimiento);
                $rspta=$persona->insertar($cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad, $fnacimiento, $genero);
                echo $rspta? "persona registrada" : "Persona no se pudo registrar";
                

            }else{
                $rspta=$persona->editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad, $fnacimiento, $genero);
                echo $rspta? "persona actualizada" : "Persona no se pudo actualizar";
                                
            }
            break;
        case 'eliminar':
            $rspta=$persona->eliminar($idpersona);
            echo $rspta? "persona eliminada" : "Persona no se pudo eliminar";
            
            break;
        case 'listar':
            $rspta=$persona->mostrarPaciente();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>$reg->idpersona,
                    "1"=>$reg->cedula,
                    "2"=>$reg->nombres,
                    "3"=>$reg->apellidos,
                    "4"=>$reg->email,
                    "5"=>$reg->telefono,
                    "6"=>$reg->direccion,
                    "7"=>$reg->ciudad_residencia,
                    "8"=>$reg->fecha_nacimiento,
                    "9"=>$reg->genero
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