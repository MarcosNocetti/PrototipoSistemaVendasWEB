<?php
session_start();
require "C:/xampp/htdocs/pizza/assets/classes/User.class.php";
    
$user = new User($_SESSION['id']);
$nome = $user->getNome();
$telefone = $user->getTelefone();
?>
