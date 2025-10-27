<?php


require_once ("../BD/Database.php");

class AppoimentTypeUtility{
    public static function getListType(){
        try{
            $instance = Database::getInstance();

            $query = "SELECT id, nombre from tipos_cita order by nombre";
            $stmt = $instance->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $exception){
            throw new Exception("Error al acceder a la base de datos");
        }
    }
}