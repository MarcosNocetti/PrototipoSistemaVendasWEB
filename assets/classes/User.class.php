<?php
class User{
    private static $pdo;

    private $id;
    private $fbId;
    private $nome;
    private $email;
    private $telefone;
    private $pass;
    private $avatar;
    private $estado;
    private $cidade;
    private $bairro;

    public static function prepare($query = false){
        if($query != false){
            if(self::$pdo == null){
                try{
                    $pdo = new PDO("sqlsrv:server = tcp:240820.database.windows.net,1433; Database = prototipo_", "lovendcode", "Prototipo+Azure", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e){
                    echo "<h2>Erro ao conectar!<h2>";
                }
            }
            $pdo = $pdo->prepare($query);
            return $pdo;
        }
        else{
            if (self::$pdo == null) {
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=prototipo_', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo "<h2>Erro ao conectar!<h2>";
                }
            }
            return $pdo;
        }
    }

    public function __construct($id = NULL){
        if(!empty($id)){
            $sql = $this->prepare("SELECT * FROM tb_admin.usuarios WHERE id = ?");
            $sql->execute(array($id));

            if($sql->rowCount()>0){
                $data = $sql->fetch();
                
                $this->id = $data['id'];
                $this->fbId = $data['fbid'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->telefone = $data['telefone'];
                $this->pass = $data['pass'];
                $this->avatar = $data['avatar'];
                $this->estado = $data['estado'];
                $this->cidade = $data['cidade'];
                $this->bairro = $data['bairro'];
            }
        }
    }

    public function getID(){
        return $this->id;
    }


    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = $n;
    }


    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = $e;
    }

    public function mudaEmail($e){
        if($this->verificaEmail($e) == false){
            $sql = "UPDATE tb_admin.usuarios SET email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $e);
            $sql->bindValue(":id", $this->id);
            $sql->execute();

            $this->email = $e;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($t){
        $this->telefone = $t;
    }
    

    public function setSenha($s){
        $this->pass = $s;
    }


    public function getFbId(){
        return $this->fbId;
    }

    public function setFbId($fbid){
        $this->fbId = $fbid;
    }

    
    public function getAvatar(){
        return $this->avatar;
    }

    public function setAvatar($a){
        $this->avatar = $a;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }public function getEstado(){
        return $this->estado;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }public function getCidade(){
        return $this->cidade;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }public function getBairro(){
        return $this->bairro;
    }

    public function SaveOrCreateUser(){
        if(!empty($this->id)){
            $sql = $this->prepare("UPDATE `tb_admin.usuarios` SET ?, ?, ?, ?, ?, ?, ?, ? WHERE id = ?");
            $sql->execute(array($this->nome, $this->email, $this->pass, $this->telefone, $this->avatar, $this->estado, $this->cidade, $this->bairro, $this->id));
        }else{
            if($this->verificaEmail($this->email) == false){
                ($this->fbId == NULL) ? $this->fbId = 0 : $this->fbId;
                ($this->telefone == NULL) ? $this->telefone = 0 : $this->telefone;
                ($this->estado == NULL) ? $this->estado = 0 : $this->estado;
                ($this->cidade == NULL) ? $this->cidade = 0 : $this->cidade;
                ($this->bairro == NULL) ? $this->bairro = 0 : $this->bairro;
                $sql = $this->prepare("INSERT INTO `tb_admin.usuarios` VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sql->execute(array($this->fbId, $this->nome, $this->email, $this->telefone, $this->pass, $this->avatar, $this->estado, $this->cidade, $this->bairro));
                return true;
            }
            else{
                return false;
            }
        }

    }

    private function verificaEmail($e){
        $sql = $this->prepare("SELECT * FROM `tb_admin.usuarios` WHERE email = ?");
        $sql->execute(array($e));

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function verificapass($pass, $id){
        $sql = 'SELECT * FROM tb_admin.usuarios WHERE email = ? AND pass = ?';
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($e, $s));

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function salvarLogarFB(){
        $sql = 'SELECT * FROM tb_admin.usuarios WHERE fbid = :fbid';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":fbid", $this->fbId);
        $sql->execute();

        if($sql->rowCount() > 0){
            foreach($sql as $dados){
                $_SESSION['id'] = $dados['id'];
                $_SESSION['fbid'] = $dados['fbid'];
            }
            
            header("Location: ../../index.php");
        }else{
            $sql = "INSERT INTO tb_admin.usuarios(id, fbid, nome, email, avatar, pass, telefone, estado, cidade, bairro) 
                    VALUES (NULL,:fbid,:nome,:email, :avatar,:pass,:telefone,:estado,:cidade,:bairro)";
                
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":fbid",$this->fbId);
            $sql->bindValue(":nome",$this->nome);
            $sql->bindValue(":email",$this->email);
            $sql->bindValue(":avatar",$this->avatar);
            $sql->bindValue(":pass",$this->pass);
            $sql->bindValue(":telefone",$this->telefone);
            $sql->bindValue(":estado", $this->estado);
            $sql->bindValue(":cidade", $this->cidade);
            $sql->bindValue(":bairro", $this->bairro);
            $sql->execute();

            $sql2 = 'SELECT * FROM tb_admin.usuarios WHERE fbid = :fbid';
            $sql2 = $this->pdo->prepare($sql2);
            $sql2->bindValue(":fbid", $this->fbId);
            $sql2->execute();

            foreach($sql2 as $dados){
                $_SESSION['id'] = $dados['id'];
                $_SESSION['fbid'] = $dados['fbid'];
            }
            
            header("Location: ../../index.php");
        }

    }

    public function defaultLogin($e, $s){
        $sql = $this->prepare("SELECT * FROM `tb_admin.usuarios` WHERE email = ? AND pass = ?");
        $sql->execute(array($e, $s));

        if($sql->rowCount() == 1){
            $dados = $sql->fetch();
            $_SESSION['id'] = $dados['id'];
            $_SESSION['fbid'] = $dados['id'];
            return true;
        }else{
            return false;
        }
    }

    public function passEmpty($id){
        $user_id = $id;
        $sql = "SELECT * FROM tb_admin.usuarios WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($user_id));

        if($sql->rowCount() == 1){
            foreach($sql as $dados);
        }

        if($dados['pass'] == null){
            return true;
        }else{
            return false;
        }
    }
}

    



?>
