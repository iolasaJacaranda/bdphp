<?php
require_once "../layout/header.php";
 
require_once "Email.php";
Email::sendEmail();
echo "Enviadndo coorreo";
?>

<?php
  require "../layout/footer.php"
?>