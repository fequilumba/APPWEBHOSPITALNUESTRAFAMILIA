<?php
 require "../config/Conexion.php";
 class Estado{
     public function __construct(){
        
     }

     //Metodo para listar estados
     public function selectEstado(){
        $sql= "SELECT * FROM `estado` e WHERE e.`idestado`>=2 ";
        return ejecutarConsulta($sql);
     }
}
?>