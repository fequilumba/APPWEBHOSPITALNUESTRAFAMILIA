<?php
    // Incluímos inicialmente la conexión a la base de datos
    require "../config/Conexion.php";

    $sql= "SELECT idcita_medica , start FROM `cita_medica`";

    $rspta=ejecutarConsulta($sql);
    //$sql=ejecutarConsulta($sql);

    $data = Array();
        while ($reg=$rspta->fetch_object()) {
            $data[]= array(
                "title"=> $reg->idcita_medica,
                "start"=>$reg->start,
            );
        }  
    echo json_encode($data); 

?>