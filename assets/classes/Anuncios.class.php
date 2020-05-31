<?php
class Anuncio{
    private static $pdo;
    private $id;
    private $userid;
    private $titulo;
    private $preco;
    private $desc;
    private $categoria_id;
    private $estado;
    private $cidade;
    private $bairro;
    private $fotos;

    public static function prepare($query = false){
        if($query != false){
            if(self::$pdo == null){
                try{
                    $pdo = new PDO('mysql:host=localhost;dbname=prototipo', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
                    $pdo = new PDO('mysql:host=localhost;dbname=prototipo', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo "<h2>Erro ao conectar!<h2>";
                }
            }
            return $pdo;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setUserId($uid){
        $this->userid = $uid;
    }public function getUserId(){
        return $this->userid;
    }

    public function setTitulo ($titulo){
        $this->titulo = $titulo;
    } public function getTitulo (){
        return $this->titulo;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    } public function getPreco(){
        return $this->preco;
    }


    public function setDesc($desc){
        $this->desc = $desc;
    } public function getDesc(){
        return $this->desc;
    }

    public function setCategoriaID($categoriaID){
        $this->categoria_id = $categoriaID;
    } public function getCategoria(){
        return $this->categoria_id;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    } public function getEstado(){
        return $this->estado;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    } public function getCidade(){
        return $this->cidade;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setFotos($fotos){
        $this->fotos = $fotos;
    }

    
    public function Save_anuncio(){

        $sql = $this->prepare("INSERT INTO `tb_site.anuncios` VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($this->userid, $this->titulo, $this->preco, $this->desc, $this->categoria_id, $this->estado, $this->cidade,$this->bairro));

        $sql2 = $this->prepare("SELECT id FROM `tb_site.anuncios` WHERE user_id = ? AND titulo = ? AND preco = ? AND descricao = ?");
        $sql2->execute(array($this->userid, $this->titulo, $this->preco, $this->desc));

        $data = $sql2->fetch();  //Pegando o ID do anuncio
        $idAnunc = $data['id'];

        if(count($this->fotos) > 0){
            for($i=0;$i<count($this->fotos['tmp_name']);$i++){
                $tipo = $this->fotos['type'][$i];
                if(in_array($tipo, array('image/jpeg', 'image/png'))){
                    $tmpname = 'iD'.$idAnunc.'_'.date('d-m-y').'_'.rand(0,9999).'.jpg';
                    move_uploaded_file($this->fotos['tmp_name'][$i], '../../assets/imgs/anuncios/'.$tmpname);

                    list($width_orig, $heigth_orig) = getimagesize('../../assets/imgs/anuncios/'.$tmpname);
                    $ratio = $width_orig/$heigth_orig;
                    $width = 500;
                    $heigth = 500;

                    if($width/$heigth > $ratio){
                        $width = $heigth * $ratio;
                    }else{
                        $heigth = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width, $heigth);
                    if($tipo == 'image/jpeg'){
                        $origi = imagecreatefromjpeg('../../assets/imgs/anuncios/'.$tmpname);
                    }elseif($tipo == 'image/png'){
                        $origi = imagecreatefrompng('../../assets/imgs/anuncios/'.$tmpname);
                    }

                    imagecopyresampled($img, $origi, 0,0,0,0, $width, $heigth, $width_orig, $heigth_orig);

                    imagejpeg($img, '../../assets/imgs/anuncios/'.$tmpname, 80);

                    $sql3 = $this->prepare("INSERT INTO `tb_anuncios.fotos` VALUES (NULL, ?, ?)");
                    $sql3->execute(array($idAnunc, $tmpname));
                }
            }
        }
    }

}
?>
