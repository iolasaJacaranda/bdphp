<?php
require_once "../layout/header.php";
require_once "AppoimentUtility.php";
require_once "../AppoimentType/AppoimentTypeUtility.php";
require_once "../User/UserUtility.php";

if (isset($_GET["action"])){
  if ($_GET["action"] == "edit"){
    // Estoy editando
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
      if (!isset($_POST["submit"])){
        $id= $_POST["id"];
        $appoiment = AppoimentUtility::getAppoiment($id);
        $appoimentsType = AppoimentTypeUtility::getListType();
        $username = UserUtility::getUserName($appoiment["usuario_id"]);
      }else{
        AppoimentUtility::updateAppoiment($_POST["id"],$_POST["typeAppoimentId"],$_POST["date"],$_POST["time"]);
        // Falta decidir que hacemos cuando ya esté modificado
      }
    }else{
      echo "<script>window.location.href=\"../error.php?msg=Imposible acceder a esta página (EDIT.PHP) por el método GET\"</script>";
    }
  }elseif ($_GET["action"] == "delete") {
    if (isset($_GET["id"])){
        $id= $_GET["id"];
        $appoiment = AppoimentUtility::getAppoiment($id);
        $typeAppoiment = AppoimentTypeUtility::getNameType($appoiment["tipo_cita_id"]);
        $username = UserUtility::getUserName($appoiment["usuario_id"]);
    }else{
      echo "<script>window.location.href=\"../error.php?msg=Imposible acceder a esta página para borrar sin identificador\"</script>";
    }
  }
}else{
    echo "<script>window.location.href=\"../error.php?msg=Imposible acceder a esta página sin identificar la acción\"</script>";

}


?>
<div>
<form method="post">

  <input id="id" name="id" type="hidden" class="form-control" value="<?=$id?>">
  <div class="form-group row">
    <label for="user_id" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
      <input id="username" name="username" type="text" class="form-control" value="<?=$username?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="typeAppoiment" class="col-4 col-form-label">Tipo de cita</label> 
    <div class="col-8">
        <?php 
          if ($_GET["action"] == "edit"){?>
        <select id="typeAppoimentId" name="typeAppoimentId" >
            <?php
            foreach ($appoimentsType as $type){
                if ($appoiment["tipo_cita_id"] == $type["id"]){
                  echo "<option value=" .$type["id"].  " selected>" .$type["nombre"]. "</option>";
                }else{
                 echo "<option value=" .$type["id"].  " >" .$type["nombre"]. "</option>";
                }
            }
            ?>          
        </select>
        <?php
          } elseif ($_GET["action"] == "delete"){?>
           <input id="typeAppoimentId" name="typeAppoimentId" type="text" class="form-control" value="<?=$typeAppoiment?>" disabled>

        <?php  }?>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="date" name="date" type="text" class="form-control" value="<?= $appoiment["fecha"] ?>" <?php $write = $_GET["action"] == "delete" ? "readonly": "";?> <?=$write?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="time" class="col-4 col-form-label">Hora</label> 
    <div class="col-8">
      <input id="time" name="time" type="text" class="form-control" value="<?= $appoiment["hora"]?>"  <?php $write = $_GET["action"] == "delete" ? "readonly": "";?> <?=$write?>>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <?php 
        switch ($_GET["action"]) {
          case "delete":
            echo '<button name="submit" type="submit" class="btn btn-primary">Borrar</button>';
            break;
          case "edit":
            echo "<button name=\"submit\" type=\"submit\" class=\"btn btn-primary\">Editar</button>";
            break;  
        }
      ?>
      
    </div>
  </div>
</form>
</div>
<?php
  require "../layout/footer.php"
?>