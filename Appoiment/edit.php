<?php
require_once "../layout/header.php";
require_once "AppoimentUtility.php";
require_once "../AppoimentType/AppoimentTypeUtility.php";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST["id"])){
        $id= $_POST["id"];
        $appoiment = AppoimentUtility::getAppoiment($id);
        $appoimentsType = AppoimentTypeUtility::getListType();

    }else{
        echo "Ahora quiero editar";
    }
}else{
    echo "<script>window.location.href=\"../error.php?msg=Imposible acceder a esta página (EDIT.PHP) por el método GET\"</script>";
}


?>
<div>
<form method="post">

  <input id="id" name="id" type="hidden" class="form-control" value="<?=$id?>" disabled>
  <div class="form-group row">
    <label for="user_id" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
      <input id="user_id" name="user_id" type="text" class="form-control" value="<?=$appoiment["usuario_id"]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="typeAppoiment" class="col-4 col-form-label">Tipo de cita</label> 
    <div class="col-8">
        <select>
            <?php
            foreach ($appoimentsType as $type){
                echo "<option value=" .$type["id"]. ">" .$type["nombre"]. "</option>";
            }
            ?>          
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="date" name="date" type="text" class="form-control" value="<?= $appoiment["fecha"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="time" class="col-4 col-form-label">Hora</label> 
    <div class="col-8">
      <input id="time" name="time" type="text" class="form-control" value="<?= $appoiment["hora"]?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Editar</button>
    </div>
  </div>
</form>
</div>
<?php
  require "../layout/footer.php"
?>