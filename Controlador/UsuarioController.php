<?php
include_once '../Modelo/Usuario.php';
session_start();
$usuario = $_POST['usuario']; 
$contrasenia = $_POST['contrasenia']; 

$usuario = new Usuario();
$usuario->login($usuario, $contrasenia); //llamamos a la funcion que se encuantra en usuario.php y le pasamos esos dos parametros
foreach ($usuario->objetos as $objeto){
    print_r($objeto->idusuario);
}


?>