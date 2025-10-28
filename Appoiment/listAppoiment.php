<?php
require_once "../layout/header.php";
require_once "AppoimentUtility.php";

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Tipo cita</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    <?php

        try {
          $appoiments = AppoimentUtility::getAppoiments();
        }catch (Exception $e){
          echo $e->getMessage();
          $appoiments= [];
        }
        
        foreach ($appoiments as $appoiment){
            echo "<tr>";
            echo "<th scope=\"row\">" . $appoiment["id"] . "</th>";
            echo "<td>" . $appoiment["usuario_id"]. "</td>";
            echo "<td>" . $appoiment["tipo_cita_id"]. "</td>";
            echo "<td>" . $appoiment["fecha"]. "</td>";
            echo "<td>" . $appoiment["hora"]. "</td>";
            echo "<td><a href=./ManagerAppoiment.php?action=delete&id=" .$appoiment["id"] . "><button class=\"btn btn-danger\">Delete</button></a></td>";
            echo "<td><form action=\"ManagerAppoiment.php?action=edit\" method=\"POST\"><input type=hidden name=\"id\" value =". $appoiment["id"] ."><button type=\"submit\" class=\"btn btn-primary\">Editar</button></td></form>";
            echo "</tr>";

        }
    ?>
    
  </tbody>
</table>

<?php
  require "../layout/footer.php"
?>

