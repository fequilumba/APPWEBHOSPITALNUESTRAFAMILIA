<?php
    require_once "../modelos/Medico.php";
    $persona = new Medico();
    $idpersona = isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
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
                $rspta=$persona->insertar($especialidad_idespecialidad ,$cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad, $fnacimiento, $genero);
                echo $rspta? "Medico registrado" : "Medico no se pudo registrar";
                

            }else{
                $rspta=$persona->editar($idpersona,$especialidad_idespecialidad, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad, $fnacimiento, $genero);
                echo $rspta? "Médico actualizado" : "No se pudo actualizar al Médico";              
            }
            break;
        case 'desactivar':
                $rspta=$persona->desactivar($idpersona);
                echo $rspta ? "Médico desactivado" : "No se pudo desactivar al Médico";
    
                break;
        case 'activar':
                $rspta=$persona->activar($idpersona);
                echo $rspta ? "Médico activada" : "No se pudo activar al Médico";
    
                break;
        case 'mostrar':
                    $rspta=$persona->mostrar($idpersona);
                    echo json_encode($rspta);
                break;
        case 'listar':
            $rspta=$persona->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=> ($reg->estado) ? 
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><li class="fa fa-close"></li></button>'
                        :
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><li class="fa fa-check"></li></button>'
                        ,
                    "1"=>$reg->especialidad,
                    "2"=>$reg->cedula,
                    "3"=>$reg->nombres,
                    "4"=>$reg->apellidos,
                    "5"=>$reg->email,
                    "6"=>$reg->telefono,
                    "7"=>$reg->direccion,
                    "8"=>$reg->ciudad_residencia,
                    "9"=>$reg->fecha_nacimiento,
                    "10"=>$reg->genero,
                    "11"=>$reg->estado ?
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

        case 'selectEspecialidad':
            require_once "../modelos/Especialidad.php";
            $especialidad = new Especialidad();
            $rspta = $especialidad->selectEspecialidad();
            while ($reg = $rspta->fetch_object()) {
                echo '<option value='.$reg->especialidad_idespecialidad.'>'
                        .$reg->nombre.
                      '</option>';
            }
        break;
    }


?>