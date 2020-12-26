<?php
include_once 'Conexion.php';
class paciente{
    public $CNX;
    
    public function __construct(){
        try{
            $this->CNX = conexion::conectar();
        }catch(Exception $e){
            die($e->getMessage);
        }
    }


    public function listar(){
        try{
            $query = "SELECT `persona`.`cedula`, `persona`.`nombres`,`persona`.`apellidos` 
                        FROM `persona`, `persona_has_rol` 
                        where `persona`.`idpersona`=`persona_has_rol`.`persona_idpersona` 
                            AND `persona_has_rol`.`rol_idrol`=3";
            $stm = $this->CNX->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}

?>