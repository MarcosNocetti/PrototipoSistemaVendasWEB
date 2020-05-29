<?php
require "C:/xampp/htdocs/pizza/assets/classes/User.class.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario = new User;

$statusRequest['status'] = "none";

if(!empty($nome) && strlen($nome) > 5){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if(!empty($senha) && strlen($senha) >= 8){
            $avatar = "default_user.png";
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setAvatar($avatar);
            
            $senha_crip = md5($senha);
            $usuario->setSenha($senha_crip);

            //$usuario->SaveOrCreateUser();

            if($usuario->SaveOrCreateUser() == false){
                $statusRequest['status'] = "e";
                echo json_encode($statusRequest);
            }else{
                $statusRequest['status'] = "d";
                echo json_encode($statusRequest);
            }
        }
    }
}else{
    echo json_encode("f");
}
