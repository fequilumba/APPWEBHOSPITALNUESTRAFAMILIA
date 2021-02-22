<?php
session_start();
    require_once "../modelos/Miperfil.php";
    $perfil = new Perfil();
    $idusuario=$_SESSION['idusuario'];
    $idpersona = isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):""; 
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

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
                {
                    $imagen=$_POST["imagenactual"];
                }
                else 
                {
                    $ext = explode(".", $_FILES["imagen"]["name"]);
                    if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
                    {
                        $imagen = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
                    }
                }
            if (empty($idpersona)) {
                //hash SHA256 en la contrasenia
                $pieces = explode(" ", $nombres); 
                    $str=""; 
                    foreach($pieces as $piece) 
                    { 
                        $str.=$piece[0]; 
                    }  
                    $contrasenia= $cedula . $str;
                    $contraseniahash=hash("SHA256",$contrasenia);
                    require_once "../modelos/Usuario.php";
                $usuario = new Usuario();
                $rspta = $usuario->insertar($cedula,$contraseniahash);
                $iduser=$rspta;
                echo $rspta? "Usuario registrado " : "Usuario no se pudo registrar ";
                $rspta2=$perfil->insertar($cedula, $nombres, $apellidos, $email, $telefono, 
                $direccion,$ciudad_residencia, $fecha_nacimiento, $genero,$idasociado,$imagen,$iduser);
                echo $rspta2? "Usuairo registrado " : "Usuario no se pudo registrar ";               

            }else{
                $rspta=$perfil->editar($idpersona, $cedula, $nombres, $apellidos, $email, $telefono, $direccion,
                $ciudad_residencia, $fecha_nacimiento, $genero,$imagen);
                echo $rspta? "Usuario actualizado" : "No se pudo actualizar lo datos del Usuario";
                                
            }
            break;
        case 'desactivar':
                $rspta=$perfil->desactivar($idpersona);
                echo $rspta ? "Paciente desactivado" : "No se pudo desactivar al paciente";
    
                break;
        case 'activar':
                $rspta=$perfil->activar($idpersona);
                echo $rspta ? "Paciente activado" : "No se pudo activar al paciente";
    
                break;
        case 'mostrar':
                    $rspta=$perfil->mostrar($idpersona);
                    echo json_encode($rspta);
                break;
        case 'listar':
            $rspta=$perfil->listar($idusuario);
            $data = Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]= array(
                    "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><li class="fa fa-edit"></li></button>',
                        "1"=>$reg->cedula,
                        "2"=>$reg->nombres,
                        "3"=>$reg->email,
                        "4"=>$reg->telefono,
                        "5"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
                        "6"=>$reg->estado ?
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