<?php
session_start();
require "xampp2/htdocs/PrototipoSistemaVendasWEB/assets/classes/User.class.php"; 
    
$user = new User($_SESSION['id']);
$nome = $user->getNome();
$telefone = $user->getTelefone();
?>