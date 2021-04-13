<?php
   // Incluímos inicialmente la conexión a la base de datos
   require "../config/Conexion.php";
   
   class Estado{
      public function __construct(){
         
      }

     //Metodo para listar estados
     public function selectEstado(){
        $sql= "SELECT * FROM `estado` e WHERE e.`idestado` IN (2,3)";
        return ejecutarConsulta($sql);
     }
   }
?>