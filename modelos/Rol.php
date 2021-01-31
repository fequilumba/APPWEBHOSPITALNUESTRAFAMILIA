<?php
 require "../config/Conexion.php";
 class Rol{
     public function __construct(){
        
     }
     public function listarRol(){
        $sql= "SELECT * FROM `rol`";
        return ejecutarConsulta($sql);
     }
     public function listarRolClientes(){
        $sql= "SELECT * FROM `rol` WHERE `idrol` != '2'";
        return ejecutarConsulta($sql);
     }
     public function listarRolAcceso(){
      $sql= "SELECT * FROM `rol` WHERE `idrol` != '4'";
      return ejecutarConsulta($sql);
   }

 }
?>