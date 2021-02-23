<?php 
session_start();
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$cedula= isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";
$nombres= isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
$apellidos= isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$email = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$telefono= isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$direccion= isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ciudad_residencia= isset($_POST["ciudad_residencia"])? limpiarCadena($_POST["ciudad_residencia"]):"";
$fecha_nacimiento= isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):""; 
$genero= isset($_POST["genero"])? limpiarCadena($_POST["genero"]):"";
$login=isset($_POST["username"])? limpiarCadena($_POST["username"]):"";
$contrasenia=isset($_POST["contrasenia"])? limpiarCadena($_POST["contrasenia"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagenactual=isset($_POST["imagenactual"])? limpiarCadena($_POST["imagenactual"]):"";

switch ($_GET["op"]){
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
        //hash SHA256 en la contrasenia
		$pieces = explode(" ", $nombres); 
        $str=""; 
        foreach($pieces as $piece) 
        { 
            $str.=$piece[0]; 
        }  
        $contrasenia= $cedula . $str;
       	$contraseniahash=hash("SHA256",$contrasenia);
		if (empty($idusuario)){
			$rspta=$usuario->insertar($cedula,$contraseniahash);
			$iduser=$rspta;
			require_once "../modelos/Persona.php";
			$persona = new Persona();
			$rspta2 = $persona->clienteRegistro($cedula, $nombres, $apellidos, $email,  $telefono, $direccion,
			$ciudad_residencia, $fecha_nacimiento, $genero,$imagen,$iduser);
			/*************email *********************/
			require_once "../modelos/Correo.php";
			$correo = new Correo();
			$rspta3 = $correo->enviar($cedula, $nombres, $apellidos, $email);
			echo $rspta2 ? "Usuario registrado " : "No se pudieron registrar todos los datos del usuario ";
			
		}
		else {
			$rspta=$usuario->editar($idusuario,$username,$contraseniahash,$email,$imagen);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-times"></i></button>':
 					' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->cedula,
				"2"=>$reg->nombres,
				"3"=>$reg->email,
				"4"=>$reg->telefono,
				"5"=>$reg->direccion,
				"6"=>$reg->ciudad_residencia,
				"7"=>$reg->fecha_nacimiento,
				"8"=>$reg->genero,
				"9"=>$reg->login,
 				"10"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
 				"11"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;
    case 'permisos':
            //Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $usuario->listaMarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->permiso_idpermiso);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value=" '.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
        
		break;
	case 'verificar':
		$logina=$_POST['logina'];
		$clavea=$_POST['clavea'];
		$rol_idrol=$_POST['rol_idrol'];
		//encriptar clave para comparar con la de la base de datos
		$clavehash=hash("SHA256",$clavea);
		//$clavehash=$clavea;
		$rspta=$usuario->verificar($logina,$clavehash,$rol_idrol);

		$fetch=$rspta->fetch_object();
		if (isset($fetch)) { //si el objeti fetch no esta vacio
			//declaramos las variables de sesion
			$_SESSION['idusuario']=$fetch->idusuario;
			$_SESSION['nombres']=$fetch->nombres;
			$_SESSION['apellidos']=$fetch->apellidos;
			$_SESSION['imagen']=$fetch->imagen;
			$_SESSION['login']=$fetch->login;
			$_SESSION['rol_idrol']=$fetch->rol_idrol;
			$_SESSION['idpersona']=$fetch->idpersona;

		}
		echo json_encode($fetch);
		break;
	case 'selectRol':
			require_once "../modelos/Rol.php";
            $rol = new Rol();
			$rspta = $rol->listarRolAcceso();
                while ($reg = $rspta->fetch_object()) {
                    echo '<option value='.$reg->idrol.'>'
                            .$reg->nombre.
                          '</option>';
                }
		break;
	case 'salir':
			//limpiamos las variables de sesion
			session_unset();
			//destruimos la sesion
			session_destroy();
			//redireccionamos al login
			header("Location: ../index.php");
		break;
}
?>