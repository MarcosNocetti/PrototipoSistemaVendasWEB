<?php
require "C:/xampp/htdocs/pizza/assets/classes/User.class.php";
session_start();

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || $_POST['senha'] != '') {$email = $_POST['email'];} else {$statusRequest['status'] = "2"; die(json_encode($statusRequest));}
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {$email = $_POST['email'];} else {$statusRequest['status'] = "e"; die(json_encode($statusRequest));}
if($_POST['senha'] != '') {$senha = $_POST['senha'];} else {$statusRequest['status'] = "s"; die(json_encode($statusRequest));}
$statusRequest['status'] = "none";

$cript_senha = md5($senha);
$user = new User();

if($user->defaultLogin($email, $cript_senha) == true)
    $statusRequest['status'] = "d";
else
    $statusRequest['status'] = "f";

die(json_encode($statusRequest));
?>
