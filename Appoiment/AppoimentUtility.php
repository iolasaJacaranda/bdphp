<?php

require_once ("../BD/Database.php");

class AppoimentUtility{

    // Método que devuelve un array asociativo con todas las citas

    public static function getAppoiments(){
        try{
            $instance = Database::getInstance();

            $query = "SELECT citas.id as \"id\", nombre_usuario as \"usuario_id\",nombre as \"tipo_cita_id\", fecha, hora FROM `citas` , usuarios, tipos_cita where citas.usuario_id = usuarios.id and citas.tipo_cita_id =tipos_cita.id";
            $stmt = $instance->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $exception){
            throw new Exception("Error al acceder a la base de datos");
        }
  
    }

    public static function getAppoiment($id){
        try{
            $instance = Database::getInstance();
            $query = "SELECT * FROM `citas` where citas.id = :id";

            $stmt = $instance->prepare($query);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            throw new Exception("Error al acceder al APPOIMENT " . $id);

        }
    }

    public static function updateAppoiment($id, $typeAppoimentId, $date,$time ){
         try{
            $instance = Database::getInstance();
            $query = "update `citas` set tipo_cita_id = :typeAppoimentId, fecha= :date, hora= :time WHERE id= :id";

            $stmt = $instance->prepare($query);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $stmt->bindParam(":typeAppoimentId",$typeAppoimentId);
            $stmt->bindParam(":date",$date);
            $stmt->bindParam(":time",$time);
            $stmt->execute();
            if ($stmt->rowCount() != 1){
                throw new Exception("No se ha podido modificar");
            }

        }catch (PDOException $e){
            throw new Exception("Error al acceder al APPOIMENT " . $id);

        }
    }
}

