<?php

require_once ("../BD/Database.php");

class UserUtility{

 
    public static function getUserName($id){
        try{
            $instance = Database::getInstance();
            $query = "SELECT nombre_usuario FROM `usuarios` where id = :id";

            $stmt = $instance->prepare($query);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            $sol=  $stmt->fetch(PDO::FETCH_ASSOC);
            return $sol["nombre_usuario"];

        }catch (PDOException $e){
            throw new Exception("Error al acceder al APPOIMENT " . $id);

        }
    }
}

