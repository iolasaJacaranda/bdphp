<?php
require_once "../layout/header.php";
require_once "AppoimentUtility.php";

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Tipo cita</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
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
            echo "</tr>";

        }
    ?>
    
  </tbody>
</table>

<?php
  require "../layout/footer.php"
?>

