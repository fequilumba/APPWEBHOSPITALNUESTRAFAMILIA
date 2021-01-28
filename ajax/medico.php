<?php
    require_once "../modelos/Medico.php";
    $medico = new Medico();

    $idpersona = isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):""; 
    $especialidad_idespecialidad = isset($_POST["especialidad_idespecialidad"])? limpiarCadena($_POST["especialidad_idespecialidad"]):""; 
    $cedula= isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";
    $nombres= isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
    $apellidos= isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
    $email = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
    $telefono= isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $direccion= isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
    $ciudad_residencia= isset($_POST["ciudad_residencia"])? limpiarCadena($_POST["ciudad_residencia"]):"";
    $fecha_nacimiento= isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):""; 
    $genero= isset($_POST["genero"])? limpiarCadena($_POST["genero"]):"";
    $imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
    $estado= isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
    $idhorario= isset($_POST["idhorario"])? limpiarCadena($_POST["idhorario"]):"";
    $hora_inicio= isset($_POST["hora_inicio"])? limpiarCadena($_POST["hora_inicio"]):"";
    $hora_fin= isset($_POST["hora_fin"])? limpiarCadena($_POST["hora_fin"]):"";

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (empty($idpersona)) {
                $rspta=$medico->insertar($cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero, $_POST['especialidad'],$_POST['rol']);
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->insertarUMedico($cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen,$_POST['rol']);
                echo $rspta? "Médico registrado" : "No se pudo registrar todos los datos del medico";
                

            }else{
                $rspta=$medico->editar($idpersona,$cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero,$_POST['especialidad'],$_POST['rol']);
                require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->editarUMedico($idpersona,$cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen,$_POST['rol']);
                echo $rspta? "Médico actualizado" : "Médico no se pudo actualizar";
                                
            }
            break;
        case 'desactivar':
                $rspta=$medico->desactivar($idpersona);
                echo $rspta ? "Médico desactivado" : "No se pudo desactivar al Médico";
    
                break;
        case 'activar':
                $rspta=$medico->activar($idpersona);
                echo $rspta ? "Médico activado" : "No se pudo activar al Médico";
    
                break;
        case 'mostrar':
                    $rspta=$medico->mostrar($idpersona);
                    echo json_encode($rspta);
                break;
        case 'listar':
            $rspta=$medico->listar();
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>($reg->estado)?
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><li class="fa fa-close"></li></button>'
                        :
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><li class="fa fa-check"></li></button>'
                        ,
                        "1"=>$reg->nombre,
                        "2"=>$reg->cedula,
                        "3"=>$reg->nombres,
                        "4"=>$reg->email,
                        "5"=>$reg->telefono,
                        "6"=>$reg->direccion,
                        "7"=>$reg->ciudad_residencia,
                        "8"=>$reg->fecha_nacimiento,
                        "9"=>$reg->genero,
                        "10"=>$reg->estado ?
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
        
        case 'especialidades':
                require_once "../modelos/Especialidad.php";
                $especialidad=new Especialidad();
                $rspta = $especialidad->listarEspecialidad();
                //obtener las especialidades asiganadas a un medico
                $id=$_GET['id'];
                $marcados = $medico->listaMarcados($id);
                //array para almacenar todas las especialidades marcadas
                $valores=array();
                //almacenar las especialdiades al usuario en el array
                while ($per =$marcados->fetch_object()) {
                    array_push($valores, $per->especialidad_idespecialidad);
                }
                //Mostrar una lista de especialidades en la vista de registro de medicos y si estan o no marcados 
                while ($reg = $rspta->fetch_object()) 
                {
                    $sw=in_array($reg->idespecialidad,$valores)?'checked':'';
                    echo '<li> <input type="checkbox" '.$sw.'  name="especialidad[]" value="'.$reg->idespecialidad.'">'.$reg->nombre.'</li>';
                }

                break;
        case 'roles':
                require_once "../modelos/Rol.php";
                $rol=new Rol();
                $rspta = $rol->listarRol();
                //Obtener los roles asignados al cleinte
                $id=$_GET['id2'];
                $marcados = $medico->listaMarcadosRol($id);
                //Declaramos el array para almacenar todos los roles marcados
                $valores=array();
        
                //Almacenar los roles asignados al cliente en el array
                while ($per = $marcados->fetch_object())
                    {
                        array_push($valores, $per->rol_idrol);
                    }
        
                //Mostramos la lista de permisos en la vista y si están o no marcados
                while ($reg = $rspta->fetch_object())
                        {
                        $sw=in_array($reg->idrol,$valores)?'checked':'';
                        echo '<li> <input type="checkbox" '.$sw.'  name="rol[]" value="'.$reg->idrol.'">'.$reg->nombre.'</li>';
                        //echo '<li> <input type="checkbox" name="rol[]" value="'.$reg->idrol.'">'.$reg->nombre.'</li>';
                } 
    
                break;
    }

?>