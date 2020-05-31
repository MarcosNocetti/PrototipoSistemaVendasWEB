<?php
require "C:/xampp2/htdocs/PrototipoSistemaVendasWEB/assets/classes/User.class.php";
session_start();

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {$email = $_POST['email'];} else {$statusRequest['status'] = "fail"; die(json_encode($statusRequest));}
if($_POST['senha'] != '') {$senha = $_POST['senha'];} else {$statusRequest['status'] = "fail"; die(json_encode($statusRequest));}
$statusRequest['status'] = "none";

$cript_senha = md5($senha);
$user = new User();

if($user->defaultLogin($email, $cript_senha) == true)
    $statusRequest['status'] = "d";
else
    $statusRequest['status'] = "d";

die(json_encode($statusRequest));
?>
