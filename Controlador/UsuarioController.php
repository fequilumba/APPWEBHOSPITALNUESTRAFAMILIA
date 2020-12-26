<?php
include_once '../Modelo/Usuario.php';
include_once '../Modelo/paciente.php';

class control{
    public $MODEL;
     public function __constructor(){
         $this->MODEL = new paciente; //nombre de la clase
     }

     public function verPacientes(){
         include_once 'Vista/VerPacientes.php';
     }
}


/*session_start();
$usuario = $_POST['usuario']; 
$contrasenia = $_POST['contrasenia']; 

$usuario = new Usuario();
$usuario->login($usuario, $contrasenia); //llamamos a la funcion que se encuantra en usuario.php y le pasamos esos dos parametros
foreach ($usuario->objetos as $objeto){
    print_r($objeto->idusuario);
}*/


?>