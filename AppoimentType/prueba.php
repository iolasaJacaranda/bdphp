<?php

require_once "../Appoiment/AppoimentUtility.php";
require_once "../email/Email.php";
require "../email/sendEmail.php";

$l = AppoimentUtility::getAppoiments();
$p = Email::sendEmail();
